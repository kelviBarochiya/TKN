<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Image;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    // function __construct()
    // {
    //      $this->middleware('permission:page-list|page-create|page-edit|page-delete', ['only' => ['index','show']]);

    //      $this->middleware('permission:page-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:page-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:page-delete', ['only' => ['destroy']]);
    // }

    // Show the list of blogs
    public function index()
    {
        $pages = Page::all();
        return view('admin.pages.list', compact('pages'));
    }

    // Show form for creating a new blog
    public function create()
    {
        return view('admin.pages.form');
    }

    // Show form for editing an existing blog
    public function edit($id)
    {
        $page = Page::findOrFail($id);
        return view('admin.pages.form', compact('page'));
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
    list($height,$width) = getImageHeightWidthForResize('Page');
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
    Page::create($data);

    return redirect()->route('pages.index')->with('success', 'Page added successfully!');
}

    
    

    // Update an existing blog
public function update(Request $request, $id)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'heading' => 'required|string|max:255',
        'description' => 'sometimes|string', // 'sometimes' makes it optional during validation
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'status' => 'required|in:0,1',
    ]);

    list($height, $width) = getImageHeightWidthForResize('Page');

    if ($request->hasFile('image')) {
        $image = $request->image;
        $imageName = $image->getClientOriginalName();
        $destination = public_path('images/');
        
        $resizeImage = Image::make($image->getRealPath());
        $resizeImage->resize($width, $height);
        $resizeImage->save($destination . $imageName, 80);
        
        $data['image'] = $imageName;
    }

    $data['status'] = (int) $data['status'];

    // Remove description from $data if it's not present in the request
    if (!$request->has('description')) {
        unset($data['description']);
    }

    $page = Page::findOrFail($id);
    $page->update($data);

    return redirect()->route('pages.index')->with('success', 'Page updated successfully!');
}


    // Delete a blog
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->delete();

        return redirect()->route('pages.index')->with('success', 'Page deleted successfully!');
    }
}
