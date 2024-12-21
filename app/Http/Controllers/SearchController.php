<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Workshop;
use App\Models\Project;
use App\Models\Internship;
use App\Models\Program;
use App\Models\Fablab;

class SearchController extends Controller
{
    

    public function search(Request $request)
{
    $query = $request->input('query');
    $combinedResults = collect();

    $models = [
        Workshop::class,
        Project::class,
        Internship::class,
        Program::class,
        Fablab::class,
        // Add more model classes as needed
    ];

    foreach ($models as $model) {
        $tableName = (new $model)->getTable();

        $results = $model::where('title', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->get(['title', 'description']);

        $combinedResults = $combinedResults->merge($this->filterResults($results, $tableName));
    }

    // Ensure uniqueness of results
    $combinedResults = $combinedResults->unique();

    // Limit the description to 100 characters
    $combinedResults = $combinedResults->map(function ($result) {
        $result['description'] = Str::limit($result['description'], 100);
        return $result;
    });

    // Return the combined results as a JSON response
    return response()->json(['searchResults' => $combinedResults->values()]);
}

private function filterResults($results, $tableName)
{
    // You can implement any additional filtering or processing logic here
    return $results->map(function ($result) use ($tableName) {
        $result['table'] = $tableName;
        return $result;
    });
}



}
