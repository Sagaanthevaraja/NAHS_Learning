<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\Parents;
use App\Models\Meeting;
use App\Models\Course;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $numLecturers = Lecturer::count();
        $numStudents = Student::count();
        $numParents = Parents::count();
        $numMeetings = Meeting::count();
        $numCourses = Course::count();

        $users = User::latest()->take(5)->get();

        $courses = Course::with('lecturer.user')->get();

        return view('admin.dashboard', compact('numLecturers', 'numStudents', 'numParents', 'numMeetings', 'numCourses', 'users', 'courses'));
    }
}
