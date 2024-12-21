<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Str;

use App\Models\User;
use App\Notifications\StudentCredentialsNotification;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public function destroy(Teacher $teacher)
    {
        // Supprimer la photo associée
        if ($teacher->photo && file_exists(public_path('storage/teachers/' . $teacher->photo))) {
            unlink(public_path('storage/teachers/' . $teacher->photo));
        }
        // Supprimer le compte utilisateur associé
        if ($teacher->user) {
            $teacher->user->delete();
        }
        // Supprimer l'enseignant
        $teacher->delete();
        return back()->with('success', 'Teacher deleted successfully.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'university' => 'required|string|in:UCA,DHBW',
            'email_teacher' => 'required|email|max:255|unique:teachers,email',
        ]);
        $photo = $request->file('photo');
        $filename = time() . '_' . $photo->getClientOriginalName();
        // $photo->storeAs('public/teachers/', $filename);
        $photo->move(public_path('storage/teachers'), $filename);
        $teacher = new Teacher();
        $teacher->firstname = $request->input('firstname');
        $teacher->lastname = $request->input('lastname');
        $teacher->speciality = $request->input('speciality');
        $teacher->nationnality = $request->input('nationnality');
        $teacher->university = $request->input('university');
        $teacher->email = $request->input('email_teacher');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->photo = $filename;
        $teacher->save();

        // Create User record for the teacher
        $user = new User();
        $user->email = $request->input('email_teacher');
        $user->name = $request->input('firstname') . ' ' . $request->input('lastname');
        $password = Str::random(8); // Generate random password
        $user->password = Hash::make($password);
        $user->profile = 'teacher';
        $user->email_verified_at = now();
        $teacher->user()->save($user);

        // Notify the user with their credentials
        $user->notify(new StudentCredentialsNotification($password));

        return redirect()->back()->with('success', 'Teacher added successfully');
    }
    public function update(Request $request, Teacher $teacher)
    {
        // Valider les nouvelles données
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'speciality' => 'required|string|max:255',
            'nationnality' => 'required|string|max:255',
            'university' => 'required|string|in:UCA,DHBW',
            'email_teacher' => 'required|email|max:255|unique:teachers,email,' . $teacher->id,
            'phone_number' => 'nullable|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Gérer la mise à jour de la photo
        if ($request->hasFile('photo')) {
            // Supprimer l'ancienne photo si elle existe
            if ($teacher->photo && file_exists(public_path('storage/teachers/' . $teacher->photo))) {
                unlink(public_path('storage/teachers/' . $teacher->photo));
            }
    
            // Enregistrer la nouvelle photo
            $photo = $request->file('photo');
            $filename = time() . '_' . $photo->getClientOriginalName();
            $photo->move(public_path('storage/teachers'), $filename);
            $teacher->photo = $filename;
        }
    
        // Mettre à jour les informations de l'enseignant
        $teacher->firstname = $request->input('firstname');
        $teacher->lastname = $request->input('lastname');
        $teacher->speciality = $request->input('speciality');
        $teacher->nationnality = $request->input('nationnality');
        $teacher->university = $request->input('university');
        $teacher->email = $request->input('email_teacher');
        $teacher->phone_number = $request->input('phone_number');
        $teacher->save();
    
        // Mettre à jour les informations du compte utilisateur associé
        if ($teacher->user) {
            $teacher->user->email = $request->input('email_teacher');
            $teacher->user->name = $request->input('firstname') . ' ' . $request->input('lastname');
            $teacher->user->save();
        }
    
        // Redirection avec un message de succès
        return redirect()->back()->with('success', 'Teacher updated successfully.');
    }
    
    public function filterTeachers(Request $request)
    {
        // Get all students
        $teachers = Teacher::all();

        // Get unique universities
        $universities = Teacher::select('university')->distinct()->pluck('university');

        // If the university parameter is provided, filter students
        $university = $request->input('university');
        $filteredTeachers = null;

        if ($university) {
            $filteredTeachers = Teacher::where('university', $university)->paginate(9);
        }

        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html = view('front.faculty_staff_exchange.faculty_staff_exchange', compact('teachers', 'universities', 'filteredTeachers', 'university'))->render();
            return response()->json(['html' => $html]);
        }

        // Pass data to the view
        return view('front.faculty_staff_exchange.faculty_staff_exchange', compact('teachers', 'universities', 'filteredTeachers', 'university'));
    }
}
