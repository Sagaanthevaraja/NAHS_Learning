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
        $lecturer = Lecturer::where('user_id', auth()->user()->id)->first();
        $schedules = ScheduleCourse::where('lecturer_id', $lecturer->id)->get();

        return view('lecturer.schedules.index', compact('schedules'));
    }

    public function create()
    {

        $courses = Course::all();
        return view('lecturer.schedules.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        $lecturer = Lecturer::where('user_id', $user->id)->first();

        if (!$lecturer) {
            return redirect()->back()->withErrors('No lecturer profile found for this user.');
        }

        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);
        $validatedData['lecturer_id'] = $lecturer->id;

        ScheduleCourse::create($validatedData);

        return redirect()->route('lecturer.schedules.index')->with('success', 'Schedule course created successfully.');
    }


    public function show(ScheduleCourse $scheduleCourse)
    {
        return view('lecturer.schedules.show', compact('scheduleCourse'));
    }

    public function edit(ScheduleCourse $scheduleCourse)
    {
        // Fetch only the courses taught by the authenticated lecturer
        $lecturer = auth()->user();
        $courses = Course::where('lecturer_id', $lecturer->id)->get();

        return view('lecturer.schedules.edit', compact('scheduleCourse', 'courses'));
    }

    public function update(Request $request, ScheduleCourse $scheduleCourse)
    {
        $lecturer = auth()->user();

        $validatedData = $request->validate([
            'course_id' => 'required|exists:courses,id',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i',
            'day' => 'required|string|max:255',
            'location' => 'required|string|max:255',
        ]);

        $validatedData['lecturer_id'] = $lecturer->id;

        $scheduleCourse->update($validatedData);

        return redirect()->route('lecturer.schedules.index')->with('success', 'Schedule course updated successfully.');
    }

    public function destroy(ScheduleCourse $scheduleCourse)
    {
        $scheduleCourse->delete();

        return redirect()->route('lecturer.schedules.index')->with('success', 'Schedule course deleted successfully.');
    }
}
