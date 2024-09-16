<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class DashboardController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();

        $availableCourses = Course::all();
        $enrolledCourse = Course::where('id', $student->course_id)->get();
        return view('student.dashboard', compact('availableCourses', 'enrolledCourse'));
    }

    public function joinQuiz(Request $request)
    {
        return redirect()->to('http://localhost:8080')->with('success', 'Quiz application started successfully!');
    }
}
