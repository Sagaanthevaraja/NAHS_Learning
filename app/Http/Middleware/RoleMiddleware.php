<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = Auth::user()->role;
        $roleRoutes = [
            'admin' => [
                'admin.dashboard',
                'admin.users.index',
                'admin.users.create',
                'admin.users.store',
                'admin.users.edit',
                'admin.users.update',
                'admin.users.destroy',
                'admin.courses.index',
                'admin.courses.create',
                'admin.courses.store',
                'admin.courses.edit',
                'admin.courses.update',
                'admin.courses.destroy',
                'admin.students.index',
                'admin.students.create',
                'admin.students.store',
                'admin.students.show',
                'admin.students.edit',
                'admin.students.update',
                'admin.students.destroy',
                'admin.meetings.indexAdmin',
                'admin.meetings.approve',
                'admin.meetings.reject',
            ],
            'student' => [
                'student.dashboard',
                'student.timetable',
                'student.join-quiz',
                'student.resources',
                'student.attendance.index',
            ],
            'lecturer' => [
                'lecturer.dashboard',
                'lecturer.course',
                'lecturer.schedules.index',
                'lecturer.schedules.create',
                'lecturer.schedules.store',
                'lecturer.schedules.show',
                'lecturer.schedules.edit',
                'lecturer.schedules.update',
                'lecturer.students',
                'lecturer.start-quiz',
                'lecturer.resources.index',
                'lecturer.resources.create',
                'lecturer.resources.store',
                'lecturer.resources.edit',
                'lecturer.resources.update',
                'lecturer.resources.destroy',
                'lecturer.attendance.index',
                'lecturer.attendance.show',
                'lecturer.attendance.mark',
                'lecturer.attendance.store',
            ],
            'parent' => [
                'parent.dashboard',
                'parent.meetings.indexParent',
                'parent.meetings.create',
                'parent.meetings.store',
            ],
        ];

        $currentRouteName = $request->route()->getName();

        if (isset($roleRoutes[$role]) && in_array($currentRouteName, $roleRoutes[$role])) {
            return $next($request);
        }

        switch ($role) {
            case 'admin':
                return redirect()->route('admin.dashboard');
            case 'student':
                return redirect()->route('student.dashboard');
            case 'lecturer':
                return redirect()->route('lecturer.dashboard');
            case 'parent':
                return redirect()->route('parent.dashboard');
            default:
                return abort(403, 'Unauthorized action.');
        }
    }
}
