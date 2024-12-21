<?php

namespace App\Http\Controllers;
// App\Http\Controllers\YourController.php

use App\Models\Exchange;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Exchangecontroller extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $exchange = new Exchange();
        $exchange->date_start=$request->input('date_start');
        $exchange->date_end=$request->input('date_end');
        $exchange->type=$request->input('type');
        $exchange->description=$request->input('description');
        $exchange->save();
        return redirect()->back()->with('success', 'Exchange added successfully');
    }
    public function destroy(Exchange $exchange)
    {
        $exchange->delete();
        return back()->with('success', 'Exchange deleted successfully.');
    }
    public function update(Request $request, Exchange $exchange)
    {
        $request->validate([
            'date_start' => 'required|date',
            'date_end' => 'required|date',
            'type' => 'required|string|max:255',
            'description' => 'required|string',
        ]);
        $exchange->date_start=$request->input('date_start');
        $exchange->date_end=$request->input('date_end');
        $exchange->type=$request->input('type');
        $exchange->description=$request->input('description');
        $exchange->save();
        return redirect()->back()->with('success', 'Exchange updated successfully');
    }
}
