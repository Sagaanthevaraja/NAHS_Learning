<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lecturer;
use App\Models\ScheduleCourse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{

    public function index()
    {
        $lecturer = auth()->user();
        $schedules = Course::where('lecturer_id', $lecturer->id)->get();
        return view('lecturer.schedules.index', compact('schedules'));
    }

    public function create()
    {
        return view('lecturer.schedules.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        ScheduleCourse::create($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule course created successfully.');
    }

    public function show(ScheduleCourse $scheduleCourse)
    {
        return view('lecturer.schedules.show', compact('scheduleCourse'));
    }

    public function edit(ScheduleCourse $scheduleCourse)
    {
        return view('lecturer.schedules.edit', compact('scheduleCourse'));
    }

    public function update(Request $request, ScheduleCourse $scheduleCourse)
    {
        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'lecturer_id' => 'required|exists:lecturers,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $scheduleCourse->update($validatedData);

        return redirect()->route('schedules.index')->with('success', 'Schedule course updated successfully.');
    }

    public function destroy(ScheduleCourse $scheduleCourse)
    {
        $scheduleCourse->delete();

        return redirect()->route('schedules.index')->with('success', 'Schedule course deleted successfully.');
    }
}
