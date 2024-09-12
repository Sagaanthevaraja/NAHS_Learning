<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('lecturer.dashboard');
    }

    public function startQuiz(Request $request)
    {
        return redirect()->to('http://localhost:8080')->with('success', 'Quiz application started successfully!');
    }
}
