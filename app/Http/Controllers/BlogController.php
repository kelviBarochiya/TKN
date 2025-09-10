<?php

namespace App\Http\Controllers;
use Image;
use App\Models\Blog;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;

class BlogController extends Controller
{

    // Show the list of blogs
    public function index()
    {
        $blogs = Blog::all();
        return view('admin.blogs.list', compact('blogs'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.blogs.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.form', compact('blog'));
    }


    public function store(Request $request)
{
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:0,1',  // Use 0 and 1 for status validation
    ]);

    // Ensure 'status' is converted to integer if passed as string
    $data['status'] = (int)$data['status'];

    // Handle image upload
    list($height,$width) = getImageHeightWidthForResize('Blog');
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $data['image'] = $imageName;
        }

    // Create a new blog post with the validated data
    Blog::create($data);

    return redirect()->route('blogs.index')->with('success', 'Blog added successfully!');
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
    
        $blog = Blog::findOrFail($id);
    
         list($height,$width) = getImageHeightWidthForResize('Blog');
        if($request->has('image')){
            $image = $request->image;
            $imageName = $image->getClientOriginalName();
            $destination = public_path('images/');
            $resizeImage = Image::make($image->getRealPath());
            $resizeImage->resize($width,$height);
            $resizeImage->save($destination.$imageName,80);
            $data['image'] = $imageName;
        }
    
        $blog->update($data);
    
        return redirect()->route('blogs.index')->with('success', 'Blog updated successfully!');
    }

    // Delete a blog
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully!');
    }
}
