<?php
// App\Http\Controllers\YourController.php
namespace App\Http\Controllers;
use App\Models\Internship;
use App\Models\Partner;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class InternshipController extends Controller
{
    public function internship_show(Internship $internship)
    {
        $internships = Internship::all();
        $partners=Partner::all();
        $students = Student::all();
        $teachers = Teacher::all();
        return view('back.internship_details', compact('internship','internships','partners','students','teachers'));
    }
    public function affectStudents(Request $request, $internshipId)
{
    // Validate the request data
    $request->validate([
        'student' => 'required|exists:students,id',
    ]);

    // Find the internship
    $internship = Internship::findOrFail($internshipId);

    // Attach the selected student to the internship if not already attached
    $studentId = $request->input('student');
    if (!$internship->students->contains($studentId)) {
        $internship->students()->attach($studentId);
    }

    // Redirect back with success message
    return redirect()->back()->with('success', 'Student added successfully to the internship.');
}
public function removeStudent($internshipId, $studentId)
{
    // Find the internship
    $internship = Internship::findOrFail($internshipId);

    // Detach the selected student from the internship
    $internship->students()->detach($studentId);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Student removed successfully from the internship.');
}
public function affectSupervisors(Request $request, $internshipId)
{
    // Validate the request data
    $request->validate([
        'supervisor' => 'required|exists:teachers,id',
    ]);

    // Find the internship
    $internship = Internship::findOrFail($internshipId);

    // Attach the selected supervisor to the internship if not already attached
    $supervisorId = $request->input('supervisor');
    if (!$internship->teachers->contains($supervisorId)) {
        $internship->teachers()->attach($supervisorId);
    }

    // Redirect back with success message
    return redirect()->back()->with('success', 'Supervisor added successfully to the internship.');
}

public function removeSupervisor($internshipId, $supervisorId)
{
    // Find the internship
    $internship = Internship::findOrFail($internshipId);

    // Detach the selected supervisor from the internship
    $internship->teachers()->detach($supervisorId);

    // Redirect back with success message
    return redirect()->back()->with('success', 'Supervisor removed successfully from the internship.');
}
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'company' => 'required|string|max:255',
            'partner_id' => 'nullable|exists:partners,id',
        ]);

        Internship::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'company' => $request->input('company'),
            'partner_id' => $request->input('partner_id'),
        ]);

        return redirect()->back()->with('success', 'Internship added successfully');
    }
    public function destroy(Internship $internship)
    {
        // Delete the internship from the database
        $internship->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Internship deleted successfully.');
    }
    public function update(Request $request, Internship $internship)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'company' => 'required|string|max:255',
            'partner_id' => 'nullable|exists:partners,id',
        ]);

        $internship->update([
            'title' => $request->input('title'),
            'slug'=> Str::slug($request->input('title')),
            'description' => $request->input('description'),
            'date_start' => $request->input('date_start'),
            'date_end' => $request->input('date_end'),
            'company' => $request->input('company'),
            'partner_id' => $request->input('partner_id'),
        ]);

        return redirect()->back()->with('success', 'Internship updated successfully');
    }
    public function filterInternships(Request $request)
    {
        // Get all workshops
        $internships = Internship::all();

        // Get unique years from both date_start and date_end columns
        $yearsStart = Internship::selectRaw('YEAR(date_start) as year')->distinct()->pluck('year');
        $yearsEnd = Internship::selectRaw('YEAR(date_end) as year')->distinct()->pluck('year');

        // Merge and sort the unique years
        $years = $yearsStart->merge($yearsEnd)->unique()->sort();

        // If the year parameter is provided, filter workshops
        $filteredInternships = null;
        $year = $request->input('year');
        if ($year) {
            $filteredInternships = Internship::whereYear('date_start', $year)
                ->orWhereYear('date_end', $year)
                ->paginate(3);
        }

        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html = view('front.internships.home_internships', compact('internships', 'years', 'filteredInternships', 'year'))->render();
            return response()->json(['html' => $html]);
        }

        // Pass data to the view
        return view('front.internships.home_internships', compact('internships', 'years', 'filteredInternships', 'year'));
    }

}