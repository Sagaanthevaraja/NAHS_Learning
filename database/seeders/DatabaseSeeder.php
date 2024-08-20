<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\Lecturer;
use App\Models\Parents;
use App\Models\Course;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create Users
        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $studentUser = User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
        Student::create([
            'user_id' => $studentUser->id,
            'status' => 'active',
        ]);

        $lecturerUser = User::factory()->create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'lecturer',
        ]);
        $lecturer = Lecturer::create([
            'user_id' => $lecturerUser->id,
        ]);

        $parentUser = User::factory()->create([
            'name' => 'Parent User',
            'email' => 'parent@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
        ]);
        Parents::create([
            'user_id' => $parentUser->id,
        ]);

        $courses = [
            [
                'course_code' => 'ACC101',
                'course_name' => 'Accounting',
                'description' => 'Introduction to Accounting',
                'stream' => 'Commerce',
                'lecturer_id' => $lecturer->id,
            ],
            [
                'course_code' => 'BUS102',
                'course_name' => 'Business Studies',
                'description' => 'Fundamentals of Business Studies',
                'stream' => 'Commerce',
                'lecturer_id' => $lecturer->id,
            ],
            [
                'course_code' => 'ECO103',
                'course_name' => 'Economics',
                'description' => 'Principles of Economics',
                'stream' => 'Commerce',
                'lecturer_id' => $lecturer->id,
            ],
        ];

        foreach ($courses as $courseData) {
            Course::create($courseData);
        }
    }
}
