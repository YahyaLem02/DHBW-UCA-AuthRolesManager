<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    /**
     * Handle user login
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user['userDetails'] = null;
            session(['user' => $user]);
            
            // Redirect based on user profile
            switch ($user->profile) {
                case 'admin':
                    return redirect()->route('dashboard'); // Redirect to the admin dashboard
    
                case 'student':
                    $student = Student::find(Auth::user()->member_id);
                    if ($student) {
                        $user['userDetails'] = (object) $student->getAttributes();
                        session(['user' => $user]);
                    }
                    return redirect(to: '/');
                case 'teacher':
                    $teacher = Teacher::find(Auth::user()->member_id);
                    if ($teacher) {
                        $user['userDetails'] = (object) $teacher->getAttributes();
                        session(['user' => $user]);
                    }
                    return redirect(to: '/');
    
                default:
                    return redirect()->route('home'); // Redirect to the home page for undefined profiles
            }
        }
    
        // Handle failed login
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }
    
    /**
     * Handle user registration
     */
    public function register(Request $request)
    {
        session(['form' => 'signup']); // Mark this as the active form
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], [
            'name.required' => 'Full name is required.',
            'email.required' => 'Email is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.unique' => 'This email address is already registered.',
            'password.required' => 'Password is required.',
            'password.min' => 'Password must be at least 8 characters.',
            'password.confirmed' => 'Password confirmation does not match.',
        ]);
    
        // Create the user
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
            'profile' => 'student',
        ]);
    
        // Send verification email
        $user->sendEmailVerificationNotification();
    
        // Log in the user
        Auth::login($user);
    
        return redirect()->route('verification.notice')->with('success', 'Registration successful! Please verify your email.');
    }
    

    /**
     * Logout the user
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
