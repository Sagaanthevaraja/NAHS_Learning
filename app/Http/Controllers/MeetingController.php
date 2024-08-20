<?php

namespace App\Http\Controllers;

use App\Models\Meeting;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function create()
    {
        $lecturers = Lecturer::all(); // Retrieve all lecturers
        return view('parent.meetings.create', compact('lecturers'));
    }

    /**
     * Store a newly created meeting in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'lecturer_id' => 'required|exists:lecturers,id',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        // Retrieve the parent_id from the Parents table where user_id matches the authenticated user's id
        $parent = \App\Models\Parents::where('user_id', auth()->id())->first();

        if (!$parent) {
            return redirect()->back()->withErrors(['error' => 'Parent not found.']);
        }

        // Create a new meeting
        Meeting::create([
            'parent_id' => $parent->id, // Use the retrieved parent_id
            'lecturer_id' => $request->input('lecturer_id'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'status' => 'pending',
        ]);

        // Redirect back to the meetings index with a success message
        return redirect()->route('parent.meetings.indexParent')->with('success', 'Meeting request submitted successfully.');
    }


    public function indexParent()
    {
        // Retrieve the parent_id from the Parents table where user_id matches the authenticated user's id
        $parent = \App\Models\Parents::where('user_id', auth()->id())->first();

        if (!$parent) {
            return redirect()->back()->withErrors(['error' => 'Parent not found.']);
        }

        // Retrieve all meetings for the authenticated parent
        $meetings = Meeting::where('parent_id', $parent->id)->get();

        // Return the parent view
        return view('parent.meetings.index', compact('meetings'));
    }


    public function indexAdmin()
    {
        // Retrieve all meetings
        $meetings = Meeting::all();

        // Return the admin view
        return view('admin.meetings.index', compact('meetings'));
    }

    public function approve(Meeting $meeting)
    {
        // Update the status to 'approved'
        $meeting->update(['status' => 'approved']);

        return redirect()->back()->with('success', 'Meeting approved successfully.');
    }

    public function reject(Meeting $meeting)
    {
        // Update the status to 'rejected'
        $meeting->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Meeting rejected successfully.');
    }
}
