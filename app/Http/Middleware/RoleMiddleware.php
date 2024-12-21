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
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'You must be logged in to access this page');
        }

        $user = Auth::user();

        foreach ($roles as $role) {
            switch ($role) {
                case 'admin':
                    if ($user->isAdmin()) return $next($request);
                    break;
                case 'student':
                    if ($user->isStudent()) return $next($request);
                    break;
                case 'teacher':
                    if ($user->isTeacher()) return $next($request);
                    break;
            }
        }

        return abort(403, 'This method is Forbidden');
    }
}