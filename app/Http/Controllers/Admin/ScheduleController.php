<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ScheduleCourse;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    // Display the list of schedules for approval or rejection
    public function index()
    {
        $schedules = ScheduleCourse::with('course', 'lecturer.user')->get();
        return view('admin.schedules.index', compact('schedules'));
    }

    // Approve a schedule
    public function approve(ScheduleCourse $schedule)
    {
        $schedule->update(['status' => 'approved', 'reason' => null]); // Clear any rejection reason
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule approved successfully.');
    }

    // Reject a schedule with a reason
    public function reject(Request $request, ScheduleCourse $schedule)
    {
        $request->validate([
            'reason' => 'required|string|max:255',
        ]);

        $schedule->update(['status' => 'rejected', 'reason' => $request->reason]);
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule rejected successfully.');
    }
}
