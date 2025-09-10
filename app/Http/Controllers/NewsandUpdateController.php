<?php

namespace App\Http\Controllers;

use App\Models\NewsandUpdate;
use Illuminate\Http\Request;

class NewsandUpdateController extends Controller
{

    // Show the list of blogs
    public function index()
    {
        $newsandupdates = NewsandUpdate::all();
        return view('admin.news_and_update.list', compact('newsandupdates'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.news_and_update.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $newsandupdate = NewsandUpdate::findOrFail($id);
        return view('admin.news_and_update.form', compact('newsandupdate'));
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
    NewsandUpdate::create($data);

    return redirect()->route('news_and_update.index')->with('success', 'News and Update added successfully!');
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
    
        $newsandupdate = NewsandUpdate::findOrFail($id);
    
        if ($request->hasFile('image')) {
            // Store the image in 'public/images' directory
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->move(public_path('images'), $fileName); // Save to public/images directory
            $data['image'] = $fileName;
        }
    
        $newsandupdate->update($data);
    
        return redirect()->route('news_and_update.index')->with('success', 'News and Update updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $newsandupdate = NewsandUpdate::findOrFail($id);
        $newsandupdate->delete();

        return redirect()->route('news_and_update.index')->with('success', 'News and Update deleted successfully!');
    }
}
