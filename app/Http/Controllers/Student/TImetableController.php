<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TImetableController extends Controller
{
    public function index()
    {
        // Static schedule data
        $timetables = [
            [
                'course' => 'Accounting',
                'day' => 'Friday',
                'time' => '3:30 pm to 6:30 pm',
                'location' => 'Seeduwa',
            ],
            [
                'course' => 'Accounting',
                'day' => 'Monday',
                'time' => '4:00 pm to 7:00 pm',
                'location' => 'Wattala',
            ],
            [
                'course' => 'Business Studies',
                'day' => 'Wednesday',
                'time' => '3:00 pm to 5:00 pm',
                'location' => 'Seeduwa',
            ],
            [
                'course' => 'Business Studies',
                'day' => 'Thursday',
                'time' => '6:00 pm to 8:00 pm',
                'location' => 'Wattala',
            ],
            [
                'course' => 'Economics',
                'day' => 'Friday',
                'time' => '7:00 pm to 9:00 pm',
                'location' => 'Seeduwa',
            ],
            [
                'course' => 'Economics',
                'day' => 'Sunday',
                'time' => '9:00 am to 12:00 pm',
                'location' => 'Wattala',
            ],
        ];

        // Pass the schedule data to the view
        return view('student.timetable.index', compact('timetables'));
    }
}
