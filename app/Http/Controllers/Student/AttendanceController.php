<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    public function index()
    {
        $student = Student::where('user_id', auth()->user()->id)->first();
        $attendances = Attendance::where('student_id', $student->id)->with('course')->get();

        return view('student.attendance.index', compact('attendances'));
    }
}
