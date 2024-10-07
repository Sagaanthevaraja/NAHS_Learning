<?php

use App\Http\Controllers\CoursesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Parent\CourseController as ParentCoursesController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Student\DashboardController as StudentDashboardController;
use App\Http\Controllers\Student\TImetableController;
use App\Http\Controllers\Lecturer\DashboardController as LecturerDashboardController;
use App\Http\Controllers\Lecturer\ScheduleController;
use App\Http\Controllers\Lecturer\LecCoursesController;
use App\Http\Controllers\Lecturer\LectureStudentController;
use App\Http\Controllers\Lecturer\AttendanceController;
use App\Http\Controllers\Lecturer\ResourceController;
use App\Http\Controllers\Parent\DashboardController as ParentDashboardController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\Student\StudentResourseController;
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

    Route::get('payments', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('payments.index');

    // Admin meeting routes
    Route::get('meetings', [MeetingController::class, 'indexAdmin'])->name('meetings.indexAdmin');
    Route::patch('meetings/{meeting}/approve', [MeetingController::class, 'approve'])->name('meetings.approve');
    Route::patch('meetings/{meeting}/reject', [MeetingController::class, 'reject'])->name('meetings.reject');
});

Route::middleware(['auth', 'role'])->prefix('lecturer')->name('lecturer.')->group(function () {
    Route::get('/dashboard', [LecturerDashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [LecCoursesController::class, 'index'])->name('course');
    Route::get('/students', [LectureStudentController::class, 'index'])->name('students');
    Route::resource('/resources', ResourceController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('attendance', AttendanceController::class)->only(['index', 'show']);
    Route::get('attendance/{course}/mark', [AttendanceController::class, 'mark'])->name('attendance.mark');
    Route::post('attendance/{course}/mark', [AttendanceController::class, 'store'])->name('attendance.store');
    Route::get('/start-quiz', [LecturerDashboardController::class, 'startQuiz'])->name('start-quiz');
});

Route::middleware(['auth', 'role'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/timetable', [TImetableController::class, 'index'])->name('timetable');
    Route::get('/resources', [StudentResourseController::class, 'index'])->name('resources');
    Route::get('/join-quiz', [StudentDashboardController::class, 'joinQuiz'])->name('join-quiz');
    Route::get('/attendance', [App\Http\Controllers\Student\AttendanceController::class, 'index'])->name('attendance.index');
    Route::resource('payments', App\Http\Controllers\Student\PaymentController::class);
});

Route::middleware(['auth', 'role'])->prefix('parent')->name('parent.')->group(function () {
    Route::get('/dashboard', [ParentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [ParentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/courses', [ParentCoursesController::class, 'index'])->name('courses.index');

    Route::get('meetings', [MeetingController::class, 'indexParent'])->name('meetings.indexParent');
    Route::get('meetings/create', [MeetingController::class, 'create'])->name('meetings.create');
    Route::post('meetings', [MeetingController::class, 'store'])->name('meetings.store');
});

require __DIR__.'/auth.php';
