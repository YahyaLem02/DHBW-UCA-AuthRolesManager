<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Fablab;

class FablabController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title_fablab' => 'required|string|max:255',
            'description_fablab' => 'required|string',
            'image_fablab' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $fablab = new Fablab();
        $fablab->title = $validatedData['title_fablab'];
        $fablab->description = $validatedData['description_fablab'];
        $fablab->slug = Str::slug($fablab->title);
        // Handle the image_fablab field
        if ($request->hasFile('image_fablab')) {
            $imageFablab = $request->file('image_fablab');
            $filename = time() . '_' . $imageFablab->getClientOriginalName();
            $imageFablab->storeAs('public/fablabs/', $filename);
            $fablab->image = $filename;
        }
        $fablab->save();
        
        return redirect()->back()->with('success', 'Fablab added successfully');
    }
    
    public function destroy(Fablab $fablab)
    {
        if ($fablab->image) {
            $imagePath = storage_path('app/public/fablabs/' . $fablab->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the fablab from the database
        $fablab->delete();

        // Redirect back with success message
        return redirect()->back()->with('success', 'fablab deleted successfully.');
    }
    public function update(Request $request, Fablab $fablab)
    {
        $validatedData = $request->validate([
            'title_fablab' => 'required|string|max:255',
            'description_fablab' => 'required|string',
            'image_fablab' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $fablab->title = $validatedData['title_fablab'];
        $fablab->description = $validatedData['description_fablab'];
        $fablab->slug = Str::slug($fablab->title);
        // Handle the image_fablab field
        if ($request->hasFile('image_fablab')) {
            // Delete old image
            if ($fablab->image) {
                $oldImagePath = storage_path('app/public/fablabs/' . $fablab->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Upload new image
            $imageFablab = $request->file('image_fablab');
            $filename = time() . '_' . $imageFablab->getClientOriginalName();
            $imageFablab->storeAs('public/fablabs/', $filename);
            $fablab->image = $filename;
        }
    
        $fablab->save();
    
        return redirect()->back()->with('success', 'Fablab updated successfully');
    }
    public function showFablabs(Request $request)
    {
        $fablabs = Fablab::paginate(3);
        if ($request->ajax()) {
            return view('front.achievements.achievements', compact('fablabs'));
        }

        return view('front.achievements.achievements', ['fablabs' => $fablabs]);
    }

    public function displayFablab(Fablab $fablabs)
    {
        return view('front.achievements.showFablab', ['fablabs' => $fablabs]);
    }
}
