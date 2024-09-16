<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Course;
use App\Models\Meeting;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Find the lecturer based on the logged-in user
        $lecturer = Lecturer::where('user_id', auth()->user()->id)->first();

        // If no lecturer is found, return an error
        if (!$lecturer) {
            return redirect()->back()->with('error', 'Lecturer profile not found.');
        }

        // Get statistics for the lecturer
        $numCourses = Course::where('lecturer_id', $lecturer->id)->count();
        $numStudents = Student::whereHas('course', function ($query) use ($lecturer) {
            $query->where('lecturer_id', $lecturer->id);
        })->count();
        $numMeetings = Meeting::where('lecturer_id', $lecturer->id)->count();

        // Get the first 5 students that are enrolled in the lecturer's courses
        $students = Student::whereHas('course', function ($query) use ($lecturer) {
            $query->where('lecturer_id', $lecturer->id);
        })->take(5)->get();

        // Get the first 3 courses taught by the lecturer
        $courses = Course::where('lecturer_id', $lecturer->id)->take(3)->get();

        return view('lecturer.dashboard', compact('students', 'courses', 'numCourses', 'numStudents', 'numMeetings'));
    }

    public function startQuiz(Request $request)
    {
        return redirect()->to('http://localhost:8080')->with('success', 'Quiz application started successfully!');
    }
}
