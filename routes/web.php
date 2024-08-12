<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Lecturer\DashboardController as LecturerDashboardController;
use App\Http\Controllers\Parent\DashboardController as ParentDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('courses', CourseController::class)->except(['show']);
    Route::resource('students', StudentController::class);
});

Route::get('/student/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard')->middleware(['auth', 'role']);
Route::get('/lecturer/dashboard', [LecturerDashboardController::class, 'index'])->name('lecturer.dashboard')->middleware(['auth', 'role']);
Route::get('/parent/dashboard', [ParentDashboardController::class, 'index'])->name('parent.dashboard')->middleware(['auth', 'role']);

require __DIR__.'/auth.php';
