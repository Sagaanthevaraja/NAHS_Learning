<?php
namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;

class LecCoursesController extends Controller
{
    public function index()
    {
        $courses = Course::with('lecturer')->get();
        return view('lecturer.course.index', compact('courses'));
    }
}