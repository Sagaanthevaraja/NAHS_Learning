<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Display courses taught by the lecturer
    public function index()
    {
        $lecturer = Lecturer::where('user_id', auth()->user()->id)->first();
        $courses = Course::where('lecturer_id', $lecturer->id)->get();
        return view('lecturer.attendance.index', compact('courses'));
    }

    // Show the attendance for a specific course
    public function show($courseId)
    {
        $course = Course::findOrFail($courseId);
        $attendances = $course->attendances;
        return view('lecturer.attendance.show', compact('course', 'attendances'));
    }

    // Show the attendance marking page for a course
    public function mark(Course $course)
    {
        $students = $course->student()->with('user')->get();
        return view('lecturer.attendance.view', compact('course', 'students'));
    }


    // Store attendance for a course
    public function store(Request $request, Course $course)
    {
        // Loop through students and save attendance
        foreach($request->students as $student_id => $status) {
            Attendance::create([
                'student_id' => $student_id,
                'course_id' => $course->id,
                'status' => $status, // present, absent, late
            ]);
        }

        return redirect()->route('lecturer.attendance.show', $course)->with('success', 'Attendance marked successfully.');
    }
}
