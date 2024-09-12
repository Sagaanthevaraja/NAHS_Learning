<?php

namespace Tests\Feature;

use App\Models\Course;
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CourseManagementTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Seed the database
        $this->artisan('db:seed');
    }

    /** @test */
    public function admin_can_create_a_course_and_delete_it()
    {
        // First, log in as the admin
        $this->post('/login', [
            'email' => 'admin@gmail.com',
            'password' => 'password',
        ]);

        // Create a lecturer for assignment
        $lecturer = Lecturer::create([
            'user_id' => User::factory()->create([
                'name' => 'Lecturer User',
                'email' => 'lecturer@test.com',
                'password' => bcrypt('password'),
                'role' => 'lecturer',
            ])->id,
        ]);

        // Simulate a POST request to create a new course
        $response = $this->post('/admin/courses', [
            'course_code' => 'tst1000',
            'course_name' => 'test course',
            'description' => 'this is a test description',
            'stream' => 'art', // Stream is 'art'
            'lecturer_id' => $lecturer->id,
        ]);

        // Assert that the course creation redirects to the courses list page
        $response->assertRedirect('/admin/courses');

        // Assert the course exists in the 'courses' table
        $this->assertDatabaseHas('courses', [
            'course_code' => 'tst1000',
            'course_name' => 'test course',
            'description' => 'this is a test description',
            'stream' => 'art',
            'lecturer_id' => $lecturer->id,
        ]);

        // Simulate deleting the created course
        $course = Course::where('course_code', 'tst1000')->first();
        $response = $this->delete("/admin/courses/{$course->id}");

        // Assert that the course deletion redirects to the courses list page
        $response->assertRedirect('/admin/courses');

        // Ensure the course no longer exists in the 'courses' table
        $this->assertDatabaseMissing('courses', [
            'id' => $course->id,
        ]);
    }
}
