<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use App\Models\Resource;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResourceController extends Controller
{
    public function index()
    {
        $resources = Resource::with('course')->get();
        return view('lecturer.resources.index', compact('resources'));
    }

    public function create()
    {
        $courses = Course::all();
        return view('lecturer.resources.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf',
            'course_id' => 'required|exists:courses,id',
        ]);

        $course = Course::find($request->course_id);
        $courseName = str_replace(' ', '_', $course->course_name);
        $currentDateTime = now()->format('Y-m-d_H-i-s');
        $newFileName = $request->title . '-' . $courseName . '-' . $currentDateTime . '.pdf';
        $filePath = $request->file('file')->storeAs('resources', $newFileName, 'public');
        Resource::create([
            'title' => $request->title,
            'file' => $filePath,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('lecturer.resources.index')->with('success', 'Resource uploaded successfully!');
    }

    public function edit(Resource $resource)
    {
        $courses = Course::all();
        return view('lecturer.resources.edit', compact('resource', 'courses'));
    }

    public function update(Request $request, Resource $resource)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'nullable|file|mimes:pdf',
            'course_id' => 'required|exists:courses,id',
        ]);

        if ($request->hasFile('file')) {
            $course = Course::find($request->course_id);
            $courseName = str_replace(' ', '_', $course->course_name);
            $currentDateTime = now()->format('Y-m-d_H-i-s');
            $newFileName = $request->title . '-' . $courseName . '-' . $currentDateTime . '.pdf';
            $filePath = $request->file('file')->storeAs('resources', $newFileName, 'public');
            $resource->update(['file' => $filePath]);
        }

        $resource->update([
            'title' => $request->title,
            'course_id' => $request->course_id,
        ]);

        return redirect()->route('lecturer.resources.index')->with('success', 'Resource updated successfully!');
    }

    public function destroy(Resource $resource)
    {
        $resource->delete();
        return redirect()->route('lecturer.resources.index')->with('success', 'Resource deleted successfully!');
    }
}
