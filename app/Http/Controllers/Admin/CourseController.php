<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = Course::with('lecturer.user')->get();

        return view('admin.courses.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Fetch all lecturers to allow assignment to a course
        $lecturers = Lecturer::with('user')->get();

        return view('admin.courses.create', compact('lecturers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string|max:255|unique:courses,course_code',
            'course_name' => 'required|string|max:255',
            'description' => 'required|string',
            'stream' => 'required|string|max:255',
            'lecturer_id' => 'required|exists:lecturers,id',
        ]);

        Course::create($request->all());

        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = Course::findOrFail($id);
        $lecturers = Lecturer::with('user')->get(); // Fetch all lecturers to allow reassignment

        return view('admin.courses.edit', compact('course', 'lecturers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'course_code' => 'required|string|max:255|unique:courses,course_code,' . $id,
            'course_name' => 'required|string|max:255',
            'description' => 'required|string',
            'stream' => 'required|string|max:255',
            'lecturer_id' => 'required|exists:lecturers,id',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());

        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return redirect()->route('admin.courses.index')
                         ->with('success', 'Course deleted successfully.');
    }
}
