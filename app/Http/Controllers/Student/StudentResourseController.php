<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class StudentResourseController extends Controller
{
    
    public function index(){
        return view('student.resources.index');
    }
}
