<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Partner;
use Illuminate\Support\Str;

class WorkshopController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'partner_id' => 'required|exists:partners,id', // Validate that the selected partner exists in the partners table
            'description' => 'required|string',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'type' => 'required|string|max:255',
            'image_workshop' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Create a new workshop instance
        $workshop = new Workshop();
        $workshop->title = $request->input('title');
        $workshop->slug = Str::slug($workshop->title);
        $workshop->partner_id = $request->input('partner_id');
        $workshop->description = $request->input('description');
        $workshop->university = $request->input('university');
        $workshop->country = $request->input('country');
        $workshop->city = $request->input('city');
        $workshop->date_start = $request->input('date_start');
        $workshop->date_end = $request->input('date_end');
        $workshop->type = $request->input('type'); 
        // Handle the image_workshop field
        if ($request->hasFile('image_workshop')) {
            $imageWorkshop = $request->file('image_workshop');
            $filename = time() . '_' . $imageWorkshop->getClientOriginalName();
            $imageWorkshop->storeAs('public/workshops/', $filename);
            $workshop->image = $filename;
        }
        // Save the workshop to the database
        $workshop->save();

        return redirect()->back()->with('success', 'Workshop added successfully');
    }

    public function destroy(Workshop $workshop)
    {
        // Delete the associated image file if it exists
        if ($workshop->image) {
            $imagePath = storage_path('app/public/workshops/' . $workshop->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the workshop
        $workshop->delete();

        return back()->with('success', 'Workshop deleted successfully.');
    }
    public function update(Request $request, Workshop $workshop)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'partner_id' => 'required|exists:partners,id',
            'description' => 'required|string',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after_or_equal:date_start',
            'type' => 'required|string|max:255',
            'image_workshop' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $workshop->fill($request->except('image_workshop'));
    
        if ($request->hasFile('image_workshop')) {
            // Delete the old image if it exists
            if ($workshop->image) {
                $oldImagePath = storage_path('app/public/workshops/' . $workshop->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Store the new image
            $imageWorkshop = $request->file('image_workshop');
            $filename = time() . '_' . $imageWorkshop->getClientOriginalName();
            $imageWorkshop->storeAs('public/workshops/', $filename);
            $workshop->image = $filename;
            $workshop->slug = Str::slug($workshop->title);
        }
    
        $workshop->save();
    
        return redirect()->back()->with('success', 'Workshop updated successfully');
    }
    public function filterWorkshop(Request $request)
    {
        // Get all workshops
        $workshops = Workshop::all();

        // Get unique years from both date_start and date_end columns
        $yearsStart = Workshop::selectRaw('YEAR(date_start) as year')->distinct()->pluck('year');
        $yearsEnd = Workshop::selectRaw('YEAR(date_end) as year')->distinct()->pluck('year');

        // Merge and sort the unique years
        $years = $yearsStart->merge($yearsEnd)->unique()->sort();

        // If the form is submitted, get the selected year
        $year = $request->input('year');

        // If the year parameter is provided, filter workshops
        $filteredWorkshops = null;
        if ($year) {
            $filteredWorkshops = Workshop::whereYear('date_start', $year)
                ->orWhereYear('date_end', $year)
                ->paginate(3);
        }

        // Return a JSON response for AJAX requests
        if ($request->ajax()) {
            $html =  view('front.workshops.workshop', compact('workshops', 'years', 'filteredWorkshops', 'year'))->render();
            return response()->json(['html' => $html]);
        }

        // Pass data to the view, including $years
        return view('front.workshops.workshop', compact('workshops', 'years', 'filteredWorkshops', 'year'));
    }
    // public function filterTeachers(Request $request)
    // {
    //     // Get all students
    //     $teachers = Teacher::all();

    //     // Get unique universities
    //     $universities = Teacher::select('university')->distinct()->pluck('university');

    //     // If the university parameter is provided, filter students
    //     $university = $request->input('university');
    //     $filteredTeachers = null;

    //     if ($university) {
    //         $filteredTeachers = Teacher::where('university', $university)->get();
    //     }

    //     // Return a JSON response for AJAX requests
    //     if ($request->ajax()) {
    //         $html = view('front.faculty_staff_exchange.faculty_staff_exchange', compact('teachers', 'universities', 'filteredTeachers', 'university'))->render();
    //         return response()->json(['html' => $html]);
    //     }

    //     // Pass data to the view
    //     return view('front.faculty_staff_exchange.faculty_staff_exchange', compact('teachers', 'universities', 'filteredTeachers', 'university'));
    // }
    
}
