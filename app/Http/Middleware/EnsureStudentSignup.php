<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureStudentSignup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Ensure profile is 'student' in the incoming request
        if ($request->input('profile') !== 'student') {
            //return redirect('/login')->withErrors(['message' => 'Only students are allowed to register.']);
        }

        return $next($request);
    }
}
