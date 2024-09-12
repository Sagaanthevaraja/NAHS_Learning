<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Lecturer;
use Illuminate\Support\Facades\Artisan;

class MeetingFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }

    /** @test */
    public function parent_can_apply_for_a_meeting()
    {
        // Log in as the parent user
        $response = $this->post('/login', [
            'email' => 'parent@gmail.com',
            'password' => 'password',
        ]);

        // Assert that the login was successful
        $response->assertRedirect('/parent/dashboard'); // Adjust the route as necessary

        // Retrieve the lecturer "Lecturer User" from the database
        $lecturer = Lecturer::whereHas('user', function ($query) {
            $query->where('name', 'Lecturer User');
        })->first();

        // Ensure that the lecturer exists
        $this->assertNotNull($lecturer, 'Lecturer not found');

        // Submit the meeting request as the logged-in parent
        $response = $this->post('/parent/meetings', [
            'lecturer_id' => $lecturer->id,
            'date' => '2024-09-11',
            'time' => '09:11',
            'reason' => 'testing purpose',
        ]);

        // Assert the meeting request was successfully created
        $response->assertRedirect('/parent/meetings');
        $response->assertSessionHas('success', 'Meeting request submitted successfully.');

        // Verify that the meeting was created in the database
        $this->assertDatabaseHas('meetings', [
            'lecturer_id' => $lecturer->id,
            'date' => '2024-09-11',
            'time' => '09:11',
            'reason' => 'testing purpose',
            'status' => 'pending',
        ]);
    }
}
