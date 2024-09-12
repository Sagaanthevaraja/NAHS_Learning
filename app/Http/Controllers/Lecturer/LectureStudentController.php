<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\Student;
use Illuminate\Http\Request;

class LectureStudentController extends Controller
{
    public function index()
    {
        $course = Course::where('lecturer_id', auth()->user()->lecturer->id)
            ->first();

        $students = Student::where('course_id', $course->id)
            ->get();
        return view('lecturer.students.index', compact('students'));
    }
}
