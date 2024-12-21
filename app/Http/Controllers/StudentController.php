<?php

// App\Http\Controllers\YourController.php

namespace App\Http\Controllers;
use Illuminate\Pagination\Paginator;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use App\Notifications\StudentCredentialsNotification;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'university' => 'required|string|in:UCA,DHBW', // Only accept these universities
            'email_student' => 'required|email|max:255|unique:students,email',
            'date_birth' => 'required|date',
            'phone_number' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Photo is optional
        ]);

        // Handle photo upload if provided
        $photo = $request->file('photo');
        $filename = null; // Default if no photo is provided
        if ($photo) {
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/students'), $filename);
        }

        // Create Student record
        $student = new Student();
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->nationnality = $request->input('nationnality');
        $student->university = $request->input('university');
        $student->date_birth = $request->input('date_birth');
        $student->email = $request->input('email_student');
        $student->phone_number = $request->input('phone_number');
        $student->photo = $filename;
        $student->save();

        // Create User record for the student
        $user = new User();
        $user->email = $request->input('email_student');
        $user->name = $request->input('firstname') . ' ' . $request->input('lastname');
        $password = Str::random(8); // Generate random password
        $user->password = Hash::make($password);
        $user->profile = 'student';
        $user->email_verified_at = now();

        // Associate the user to the student (morph relationship)
        $student->user()->save($user);

        // Notify the user with their credentials
        $user->notify(new StudentCredentialsNotification($password));

        // Redirect back with success message
        return redirect()->back()->with('success', 'Student added successfully');
    }

    public function destroy(Student $student)
    {
        // Supprimer la photo associée s'il existe
        if ($student->photo && file_exists(public_path('storage/students/' . $student->photo))) {
            unlink(public_path('storage/students/' . $student->photo));
        }

        // Supprimer le compte utilisateur lié si existant
        if ($student->user) {
            $student->user->delete();
        }

        // Supprimer l'étudiant
        $student->delete();

        // Redirection avec message de succès
        return back()->with('success', 'Student deleted successfully.');
    }

    public function update(Request $request, Student $student)
    {
        // Validation des données entrantes
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'university' => 'required|string|in:UCA,DHBW', // Vérifie la validité de l'université
            'email_student' => 'required|email|max:255|unique:students,email,' . $student->id,
            'date_birth' => 'required|date',
            'phone_number' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Photo est facultative
        ]);
    
        // Gérer la mise à jour de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($student->photo && file_exists(public_path('storage/students/' . $student->photo))) {
                unlink(public_path('storage/students/' . $student->photo));
            }
    
            // Enregistrer la nouvelle photo
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/students'), $filename);
            $student->photo = $filename;
        }
    
        // Mettre à jour les informations générales de l'étudiant
        $student->firstname = $request->input('firstname');
        $student->lastname = $request->input('lastname');
        $student->nationnality = $request->input('nationnality');
        $student->university = $request->input('university');
        $student->date_birth = $request->input('date_birth');
        $student->email = $request->input('email_student');
        $student->phone_number = $request->input('phone_number');
        $student->save();
    
        // Mettre à jour le compte utilisateur associé
        if ($student->user) {
            $student->user->email = $request->input('email_student');
            $student->user->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $student->user->save();
        }
    
        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Student information updated successfully.');
    }
    
    public function showProfile($id)
    {
        $student = Student::findOrFail($id);
        return view('back.student_profile', ['student' => $student]);
    }
    public function filterStudents(Request $request)
    {
        // Get all students
        $students = Student::all();
        // Get unique universities
        $universities = Student::select('university')->distinct()->pluck('university');
        // If the university parameter is provided, filter students
        $university = $request->input('university');
        $filteredStudents = null;

        if ($university) {
            $filteredStudents = Student::with('internships') // Eager loading
                ->where('university', $university)
                ->paginate(9);
        }

        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html = view('front.exchange_students.students_profiles', compact('students', 'universities', 'filteredStudents', 'university'))->render();
            return response()->json(['html' => $html]);
        }

        // For non-AJAX requests, render the view as usual
        return view('front.exchange_students.students_profiles', compact('students', 'universities', 'filteredStudents', 'university'));
    }
}
