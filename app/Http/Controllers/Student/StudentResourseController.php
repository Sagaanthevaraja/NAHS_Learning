<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Resource;

use Illuminate\Http\Request;

class StudentResourseController extends Controller
{

    public function index(){
        $resources = Resource::with('course')->get();
        return view('student.resources.index', compact('resources'));
    }
}
