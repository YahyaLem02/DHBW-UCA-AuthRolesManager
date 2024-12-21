<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LogController extends Controller
{
    public function showLoginForm()
    {
        return view('front.login.login');
    }
    
    public function login(Request $request)
    {
        // Validate the request data
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Attempt to authenticate the user based on email
        $credentials = $request->only('email', 'password');
    
        // Check if the user is a teacher
        $teacher = Teacher::where('email', $credentials['email'])->first();
    
        if ($teacher && $credentials['password'] === $teacher->password) {
            // Authentication passed for teacher
            Auth::guard('teacher')->login($teacher);
            return redirect()->route('front.index');
        }
    
        // Check if the user is a student
        $student = Student::where('email', $credentials['email'])->first();
    
        if ($student && $credentials['password'] === $student->password) {
            // Authentication passed for student
            Auth::guard('student')->login($student);
            return redirect()->route('front.index');
        }
    
        // Authentication failed
        return redirect()->route('login')->with('error', 'Invalid email or password');
    }
}
