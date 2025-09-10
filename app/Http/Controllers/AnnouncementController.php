<?php

namespace App\Http\Controllers;

use App\Models\Announcements;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    // Show the list of blogs
    public function index()
    {
        $announcements = Announcements::all();
        return view('admin.announcements.list', compact('announcements'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.announcements.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $announcement = Announcements::findOrFail($id);
        return view('admin.announcements.form', compact('announcement'));
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
    Announcements::create($data);

    return redirect()->route('announcements.index')->with('success', 'Announcement added successfully!');
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
    
        $announcement = Announcements::findOrFail($id);
    
        if ($request->hasFile('image')) {
            // Store the image in 'public/images' directory
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName); // Save to public/images directory
            $data['image'] = $fileName;
        }
    
        $announcement->update($data);
    
        return redirect()->route('announcements.index')->with('success', 'Announcement updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $announcement = Announcements::findOrFail($id);
        $announcement->delete();

        return redirect()->route('announcements.index')->with('success', 'Announcement deleted successfully!');
    }
}
