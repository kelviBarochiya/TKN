<?php

namespace App\Http\Controllers;

use App\Models\Councillor;
use Illuminate\Http\Request;

class CouncillorController extends Controller
{
    // List Councillors
    public function index()
    {
        $councillors = Councillor::all();
        return view('admin.councillors.list', compact('councillors'));
    }

    // Show Create Form
    public function create()
    {
        return view('admin.councillors.form', ['councillor' => null]);
    }

    // Store Data
    public function store(Request $request)
    {
        $validated = $request->validate([
            'municipality_name' => 'required|string',
            'ward_number' => 'required|integer',
            'member_name' => 'required|string',
            'father_husband_name' => 'required|string',
            'address' => 'required|string',
            'designation' => 'required|string',
            'mobile_number' => 'required|string|max:15',
        ]);

        Councillor::create($validated);

        return redirect()->route('councillors.index')->with('success', 'Councillor Created');
    }

    // Show Edit Form
    public function edit($id)
    {
        $councillor = Councillor::findOrFail($id);
        return view('admin.councillors.form', compact('councillor'));
    }

    // Update Data
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'municipality_name' => 'required|string',
            'ward_number' => 'required|integer',
            'member_name' => 'required|string',
            'father_husband_name' => 'required|string',
            'address' => 'required|string',
            'designation' => 'required|string',
            'mobile_number' => 'required|string|max:15',
        ]);

        $councillor = Councillor::findOrFail($id);
        $councillor->update($validated);

        return redirect()->route('councillors.index')->with('success', 'Councillor Updated');
    }

    // Delete Data
    public function destroy($id)
    {
        Councillor::findOrFail($id)->delete();
        return redirect()->route('councillors.index')->with('success', 'Councillor Deleted');
    }
}
