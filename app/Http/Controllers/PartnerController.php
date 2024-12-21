<?php

// App\Http\Controllers\YourController.php
namespace App\Http\Controllers;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
class PartnerController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name_company' => 'required|string|max:255',
            'function_company' => 'required|string|max:255',
            'description' => 'required|string',
            'adress' => 'required|string|max:255',
            'email_company' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $partner=new Partner();
        $logo = $request->file('logo');
        $filename = time() . '_' . $logo->getClientOriginalName();
        $logo->storeAs('public/partners/', $filename);
        $partner->name_company = $request->input('name_company');
        $partner->function_company = $request->input('function_company');
        $partner->description = $request->input('description');
        $partner->adress = $request->input('adress');
        $partner->email_company = $request->input('email_company');
        $partner->website = $request->input('website');
        $partner->fax = $request->input('fax');
        $partner->logo =$filename;
        $partner->save();
        return redirect()->back()->with('success', 'Partner added successfully');
    }
    public function destroy(Partner $partner)
    {    

        // Check if the file exists before attempting to delete it
        if ($partner->logo) {
            $imagePath = storage_path('app/public/partners/' .  $partner->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
        $partner->delete();
        return back()->with('success', 'Partner deleted successfully.');
    }
    public function update(Request $request, Partner $partner)
    {
        $request->validate([
            'name_company' => 'required|string|max:255',
            'function_company' => 'required|string|max:255',
            'description' => 'required|string',
            'adress' => 'required|string|max:255',
            'email_company' => 'required|email|max:255',
            'website' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $logo = $request->file('logo');
        $filename = time() . '_' . $logo->getClientOriginalName();
        $logo->storeAs('public/partners/', $filename);

        // Check if the file exists before attempting to delete it
        if ($partner->logo) {
            $imagePath = storage_path('app/public/partners/' .  $partner->logo);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $partner->name_company = $request->input('name_company');
        $partner->function_company = $request->input('function_company');
        $partner->description = $request->input('description');
        $partner->adress = $request->input('adress');
        $partner->email_company = $request->input('email_company');
        $partner->website = $request->input('website');
        $partner->fax = $request->input('fax');
        $partner->logo =$filename;
        $partner->save();

        return redirect()->back()->with('success', 'Partner updated successfully');
    }
    public function showPartners(Request $request)
    {
        $partners = Partner::paginate(3);

        if ($request->ajax()) {
            return view('front.partners.partners', compact('partners'));
        }

        return view('front.partners.partners', ['partners' => $partners]);
    }
}

