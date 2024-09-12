<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Meeting;
use App\Models\Lecturer;
use App\Models\Parents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class MeetingAdminActionsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');  // Seeds required roles and users
    }

    /** @test */
    public function admin_can_reject_and_approve_a_meeting()
    {
        // Log in as the parent user
        $parentUser = User::where('email', 'parent@gmail.com')->first();

        $this->actingAs($parentUser);

        // Seed a lecturer
        $lecturer = Lecturer::whereHas('user', function ($query) {
            $query->where('name', 'Lecturer User');
        })->first();

        // Seed a meeting for the parent
        $meeting = Meeting::create([
            'parent_id' => Parents::where('user_id', $parentUser->id)->first()->id,
            'lecturer_id' => $lecturer->id,
            'date' => '2024-09-11',
            'time' => '09:11:00',
            'status' => 'pending',
            'reason' => 'Testing rejection and approval',
        ]);

        // Log out the parent user and log in as the admin
        $this->post('/logout');

        $adminUser = User::where('email', 'admin@gmail.com')->first();
        $this->actingAs($adminUser);

        // Reject the meeting
        $rejectResponse = $this->patch(route('admin.meetings.reject', $meeting->id));

        // Assert the meeting was rejected
        $rejectResponse->assertRedirect();  // Check redirect after action
        $this->assertDatabaseHas('meetings', [
            'id' => $meeting->id,
            'status' => 'rejected',
        ]);

        // Approve the meeting (to reset its state)
        $approveResponse = $this->patch(route('admin.meetings.approve', $meeting->id));

        // Assert the meeting was approved
        $approveResponse->assertRedirect();  // Check redirect after action
        $this->assertDatabaseHas('meetings', [
            'id' => $meeting->id,
            'status' => 'approved',
        ]);
    }
}
