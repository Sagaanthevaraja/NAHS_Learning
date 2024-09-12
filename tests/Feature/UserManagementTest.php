<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Parents;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed the database
        $this->artisan('db:seed');
    }

    /** @test */
    public function admin_can_create_a_user_with_role_parents_and_delete_it()
    {
        // First, log in as the admin
        $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        // Simulate a POST request to create a new user with role parents
        $response = $this->post('/admin/users', [
            'name' => 'testparent',
            'email' => 'testparent@test.com',
            'password' => 'testpassword',
            'password_confirmation' => 'testpassword',
            'role' => 'parents', // Role is 'parents'
        ]);

        // Assert that the user creation redirects to the users list page
        $response->assertRedirect('/admin/users');

        // Assert the user exists in the 'users' table
        $this->assertDatabaseHas('users', [
            'email' => 'testparent@test.com',
            'name' => 'testparent',
            'role' => 'parents',
        ]);

        // Assert that the associated record exists in the 'parents' table
        $user = User::where('email', 'testparent@test.com')->first();
        $this->assertDatabaseHas('parents', [
            'user_id' => $user->id,
        ]);

        // Simulate deleting the created user
        $response = $this->delete("/admin/users/{$user->id}");

        // Assert that the user deletion redirects to the users list page
        $response->assertRedirect('/admin/users');

        // Ensure the user no longer exists in the 'users' table
        $this->assertDatabaseMissing('users', [
            'id' => $user->id,
        ]);

        // Ensure the associated record is also deleted from the 'parents' table
        $this->assertDatabaseMissing('parents', [
            'user_id' => $user->id,
        ]);
    }
}
