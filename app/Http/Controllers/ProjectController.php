<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_project' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project = new Project();
        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->slug = Str::slug($project->title);
        // Handle the image_project field
        if ($request->hasFile('image_project')) {
            $imageProject = $request->file('image_project');
            $filename = time() . '_' . $imageProject->getClientOriginalName();
            $imageProject->storeAs('public/projects/', $filename);
            $project->image = $filename;
        }

        $project->save();

        return redirect()->back()->with('success', 'Project added successfully');
    } 
    

    public function destroy(Project $project)
    {
        // Delete the associated image file if it exists
        if ($project->image) {
            $imagePath = storage_path('app/public/projects/' . $project->image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        // Delete the project
        $project->delete();
        return redirect()->back()->with('success', 'Project deleted successfully.');
    }
    public function showProjects(Request $request)
    {
        $projects = Project::paginate(3);
        if ($request->ajax()) {
            return view('front.research_projects.research_projects', compact('projects'));
        }

        return view('front.research_projects.research_projects', ['projects' => $projects]);
    }

    public function displayProject(Project $projects)
    {
        //$news = News::findOrFail($id);

        return view('front.research_projects.showProjects', ['projects' => $projects]);
    }
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image_project' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $project->title = $request->input('title');
        $project->description = $request->input('description');
        $project->slug = Str::slug($project->title);
        // Handle the image_project field
        if ($request->hasFile('image_project')) {
            // Delete the old image file if it exists
            if ($project->image) {
                $oldImagePath = storage_path('app/public/projects/' . $project->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Store the new image file
            $imageProject = $request->file('image_project');
            $filename = time() . '_' . $imageProject->getClientOriginalName();
            $imageProject->storeAs('public/projects/', $filename);
            $project->image = $filename;
        }

        $project->save();

        return redirect()->back()->with('success', 'Project updated successfully');
    }
    
}
