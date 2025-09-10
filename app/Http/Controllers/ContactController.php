<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    // function __construct()

    // {

    //      $this->middleware('permission:contact-list|contact-create|contact-edit|contact-delete', ['only' => ['index','show']]);

    //      $this->middleware('permission:contact-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:contact-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:contact-delete', ['only' => ['destroy']]);

    // }

    // Show the list of contacts
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.contacts.list', compact('blogs'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.contacts.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.contacts.form', compact('blog'));
    }


    public function store(Request $request)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'heading' => 'required|string|max:255',
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
    Blog::create($data);

    return redirect()->route('contacts.index')->with('success', 'Blog added successfully!');
}

    
    

    // Update an existing blog
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'status' => 'required|in:0,1',  // Use 0 and 1 for status validation
        ]);
    
        // Ensure 'status' is converted to integer if passed as string
        $data['status'] = (int)$data['status'];
    
        $blog = Blog::findOrFail($id);
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('images')->store('images', 'public');
        }
    
        $blog->update($data);
    
        return redirect()->route('contacts.index')->with('success', 'Blog updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('contacts.index')->with('success', 'Blog deleted successfully!');
    }
}
