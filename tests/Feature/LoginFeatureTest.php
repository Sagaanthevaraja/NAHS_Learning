<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class LoginFeatureTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        
        // Refresh the database and seed it before each test
        Artisan::call('migrate:fresh');
        Artisan::call('db:seed');
    }

    /** @test */
    public function admin_can_login_with_valid_credentials()
    {
        // Simulate a login request with the admin's valid credentials
        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password', // Assuming this is the correct password
        ]);

        // Assert the user is redirected to the intended route (e.g., home)
        $response->assertRedirect('/admin/dashboard'); // Adjust this to your actual redirect route

        // Assert the user is authenticated
        $this->assertAuthenticated();
    }

    /** @test */
    public function admin_cannot_login_with_invalid_password()
    {
        // Attempt to log in with the correct email but wrong password
        $response = $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'wrongpassword',
        ]);

        // Assert that the login fails and redirects back with errors
        $response->assertSessionHasErrors('email');

        // Assert that the user is not authenticated
        $this->assertGuest();
    }
}
