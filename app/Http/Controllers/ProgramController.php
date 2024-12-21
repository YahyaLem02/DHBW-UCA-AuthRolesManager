<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use Illuminate\Support\Str;

class ProgramController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'NB_hours' => 'required|integer',
            'course' => 'required|string',
            'image_program' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string',
        ]);

        $program = new Program();
        $program->teacher_id = $validatedData['teacher_id'];
        $program->title = $validatedData['title'];
        $program->slug = Str::slug($program->title);
        $program->description = $validatedData['description'];
        $program->NB_hours = $validatedData['NB_hours'];
        $program->course = $validatedData['course'];

        // Handle the image_program field
        if ($request->hasFile('image_program')) {
            $imageProgram = $request->file('image_program');
            $filename = time() . '_' . $imageProgram->getClientOriginalName();
            $imageProgram->storeAs('public/programs/', $filename);
            $program->image_program = $filename;
        }

        $program->type = $validatedData['type'];
        $program->save();

        return redirect()->back()->with('success', 'Program added successfully');
    }

    public function destroy(Program $program)
    {
        if ($program->image) {
            $imagePath = storage_path('app/public/programs/' . $program->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the program from the database
        $program->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Program deleted successfully.');
    }
    public function update(Request $request, Program $program)
    {
        $validatedData = $request->validate([
            'teacher_id' => 'nullable|exists:teachers,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'NB_hours' => 'required|integer',
            'course' => 'required|string',
            'image_program' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'type' => 'required|string',
        ]);
    
        $program->teacher_id = $validatedData['teacher_id'];
        $program->title = $validatedData['title'];
        $program->slug = Str::slug($program->title);
        $program->description = $validatedData['description'];
        $program->NB_hours = $validatedData['NB_hours'];
        $program->course = $validatedData['course'];
    
        // Handle the image_program field
        if ($request->hasFile('image_program')) {
            // Delete the old image
            if ($program->image_program) {
                $oldImagePath = storage_path('app/public/programs/' . $program->image_program);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Store the new image
            $imageProgram = $request->file('image_program');
            $filename = time() . '_' . $imageProgram->getClientOriginalName();
            $imageProgram->storeAs('public/programs/', $filename);
            $program->image_program = $filename;
        }
    
        $program->type = $validatedData['type'];
        $program->save();
    
        return redirect()->back()->with('success', 'Program updated successfully');
    }
    public function filterAcademicPrograms(Request $request)
    {
        // Get only programs with type 'academic' (case-insensitive)
        $programs = Program::whereRaw('LOWER(type) = ?', ['academic'])->get();

        // Get unique universities for academic programs
        $titles = $programs->pluck('title')->unique();

        // If the university parameter is provided, filter academic programs
        $title = $request->input('title');
        $filteredPrograms = null;

        if ($title) {
            $filteredPrograms = Program::where('title', $title)
                ->whereRaw('LOWER(type) = ?', ['academic'])
                ->paginate(3);
        }
        
        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html =  view('front.programs.academic_programs', compact('programs', 'titles', 'filteredPrograms', 'title'))->render();
            return response()->json(['html' => $html]);
        }

        // Pass data to the view
        return view('front.programs.academic_programs', compact('programs', 'titles', 'filteredPrograms', 'title'));
    }

    public function filterCulturalPrograms(Request $request)
    {
        // Get only programs with type 'cultural' (case-insensitive)
        $programs = Program::whereRaw('LOWER(type) = ?', ['cultural'])->get();

        // Get unique titles for cultural programs
        $titles = $programs->pluck('title')->unique();

        // If the title parameter is provided, filter cultural programs
        $title = $request->input('title');
        $filteredPrograms = null;

        if ($title) {
            $filteredPrograms = Program::where('title', $title)
                ->whereRaw('LOWER(type) = ?', ['cultural'])
                ->paginate(3);
        }
        
        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html =  view('front.programs.cultural_programs', compact('programs', 'titles', 'filteredPrograms', 'title'))->render();
            return response()->json(['html' => $html]);
        }

        // Pass data to the view
        return view('front.programs.cultural_programs', compact('programs', 'titles', 'filteredPrograms', 'title'));
    }
}
