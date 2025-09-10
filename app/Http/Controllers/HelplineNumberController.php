<?php

namespace App\Http\Controllers;

use App\Models\HelplineNumber;
use Illuminate\Http\Request;

class HelplineNumberController extends Controller
{
    // Show all helpline numbers
    public function index()
    {
        $helplineNumbers = HelplineNumber::all();
        return view('admin.helpline.list', compact('helplineNumbers'));
    }

    // Show create form
    public function create()
    {
        return view('admin.helpline.form');
    }

    // Store new helpline number
    public function store(Request $request)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'status' => 'required|in:1,0',
        ]);

        // Create a new helpline number
        HelplineNumber::create($data);

        // Redirect to the index page with success message
        return redirect()->route('helpline-numbers.index')->with('success', 'Helpline number created successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        // Find the helpline number by ID
        $helplineNumber = HelplineNumber::findOrFail($id);

        // Return the form view with the existing data
        return view('admin.helpline.form', compact('helplineNumber'));
    }

    // Update the helpline number
    public function update(Request $request, $id)
    {
        // Validate the request data
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            'status' => 'required|in:1,0',
        ]);

        // Find the existing helpline number by ID and update it
        $helplineNumber = HelplineNumber::findOrFail($id);
        $helplineNumber->update($data);

        // Redirect to the index page with success message
        return redirect()->route('helpline-numbers.index')->with('success', 'Helpline number updated successfully!');
    }

    // Delete helpline number
    public function destroy($id)
    {
        // Find the helpline number and delete it
        $helplineNumber = HelplineNumber::findOrFail($id);
        $helplineNumber->delete();

        // Redirect to the index page with success message
        return redirect()->route('helpline-numbers.index')->with('success', 'Helpline number deleted successfully!');
    }
}
