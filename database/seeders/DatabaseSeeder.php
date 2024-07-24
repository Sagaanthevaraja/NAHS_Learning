<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);
        User::factory()->create([
            'name' => 'Student User',
            'email' => 'student@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'student',
        ]);
        User::factory()->create([
            'name' => 'Lecturer User',
            'email' => 'lecturer@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'lecturer',
        ]);
        User::factory()->create([
            'name' => 'Parent User',
            'email' => 'parent@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'parent',
        ]);
    }
}
