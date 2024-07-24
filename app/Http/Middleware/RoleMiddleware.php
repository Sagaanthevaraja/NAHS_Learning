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
                'admin.users.destroy'
            ],
            'student' => ['student.dashboard'],
            'lecturer' => ['lecturer.dashboard'],
            'parent' => ['parent.dashboard'],
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
