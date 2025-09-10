<?php

namespace App\Http\Controllers;

use App\Models\NewSchemeintegration;
use Illuminate\Http\Request;

class NewSchemeIntegrationController extends Controller
{
    public function index()
    {
        $newschemes = NewSchemeintegration::all();
        return view('admin.new_scheme_integration.list', compact('newschemes'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.new_scheme_integration.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $newscheme = NewSchemeintegration::findOrFail($id);
        return view('admin.new_scheme_integration.form', compact('newscheme'));
    }


    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:0,1',  // Use 0 and 1 for status validation
        ]);

        // Ensure 'status' is converted to integer if passed as string
        $data['status'] = (int)$data['status'];

        // Handle image upload
        if ($request->hasFile('image')) {
            // Store the image in 'public/images' directory
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName); // Save to public/images directory
            $data['image'] = $fileName;
        }

        // Create a new blog post with the validated data
        NewSchemeintegration::create($data);

        return redirect()->route('new_scheme_integration.index')->with('success', 'New Scheme Integration added successfully!');
    }
    // Update an existing blog
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:0,1',  // Use 0 and 1 for status validation
        ]);

        // Ensure 'status' is converted to integer if passed as string
        $data['status'] = (int)$data['status'];

        $newscheme = NewSchemeintegration::findOrFail($id);

        if ($request->hasFile('image')) {
            // Store the image in 'public/images' directory
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName); // Save to public/images directory
            $data['image'] = $fileName;
        }

        $newscheme->update($data);

        return redirect()->route('new_scheme_integration.index')->with('success', 'New Scheme Integration updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $newscheme = NewSchemeintegration::findOrFail($id);
        $newscheme->delete();

        return redirect()->route('new_scheme_integration.index')->with('success', 'New Scheme Integration deleted successfully!');
    }
}
