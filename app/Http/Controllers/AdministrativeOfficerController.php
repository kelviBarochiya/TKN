<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdministrativeOfficer;

class AdministrativeOfficerController extends Controller
{
    // Show list of officers
    public function index()
    {
        $officers = AdministrativeOfficer::all();
        return view('admin.officers.list', compact('officers'));
    }

    // Show create form
    public function create()
    {
        return view('admin.officers.form');
    }

    // Store new officer data
    public function store(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image',
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:administrative_officers,email',
            'address' => 'nullable',
            'phone_number' => 'nullable|digits:10',
        ]);

        $imageName = time().'.'.$request->profile_image->extension();
        $request->profile_image->move(public_path('images'), $imageName);

        AdministrativeOfficer::create([
            'profile_image' => $imageName,
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('officers.index')->with('success', 'Administrative Officer added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $officer = AdministrativeOfficer::findOrFail($id);
        return view('admin.officers.form', compact('officer'));
    }

    // Update officer data
    public function update(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'nullable|image',
            'name' => 'required',
            'designation' => 'required',
            'email' => 'required|email|unique:administrative_officers,email,'.$id,
            'address' => 'nullable',
            'phone_number' => 'nullable|digits:10',
        ]);

        $officer = AdministrativeOfficer::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            $imageName = time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('images'), $imageName);
            $officer->profile_image = $imageName;
        }

        $officer->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'email' => $request->email,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        return redirect()->route('officers.index')->with('success', 'Administrative Officer updated successfully!');
    }

    // Delete officer data
    public function destroy($id)
    {
        $officer = AdministrativeOfficer::findOrFail($id);
        $officer->delete();
        return redirect()->route('officers.index')->with('success', 'Administrative Officer deleted successfully!');
    }
}
