<?php

namespace App\Http\Controllers;

use App\Models\PageBanner;
use Illuminate\Http\Request;

class PageBannerController extends Controller
{
    // Show the list of banners
    public function index()
    {
        $banners = PageBanner::all(); // Fetch all banners
        return view('admin.page_banner.list', compact('banners'));
    }

    // Show the form for creating a new banner
    public function create()
    {
        $pages = ['about-us','projects', 'contact-us','services','projects','term-conditon','privacy-policy    ']; 
        return view('admin.page_banner.form', compact('pages'));
    }

    // Store a newly created banner
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        // Handle image upload for the 'store' method
        if ($request->hasFile('image')) {
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // Save image to the public/images directory
            $request->file('image')->move(public_path('images'), $fileName);
        }
    
        // Store the data
        PageBanner::create([
            'page_name' => $request->page_name,
            'image' => $fileName, // Save the filename in the database
        ]);
    
        return redirect()->route('page-banners.index')->with('success', 'Banner created successfully!');
    }
    
    // Show the form for editing the specified banner
    public function edit($id)
    {
        $banner = PageBanner::findOrFail($id);
        $pages = ['about-us', 'blog', 'blog-details','mission-vission','contact', 'gallery','gallery-images','video']; // Define pages for selection
        return view('admin.page_banner.form', compact('banner', 'pages'));
    }

    // Update the specified banner
    public function update(Request $request, $id)
    {
        $request->validate([
            'page_name' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Image is optional for update
        ]);
    
        $banner = PageBanner::findOrFail($id);
    
        // Handle image upload if provided in the 'update' method
        if ($request->hasFile('image')) {
            // Delete the old image
            $oldImagePath = public_path('images/' . $banner->image);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath); // Remove the old image
            }
    
            $fileName = time() . '.' . $request->file('image')->getClientOriginalExtension();
            // Save new image to the public/images directory
            $request->file('image')->move(public_path('images'), $fileName);
            $banner->image = $fileName; // Update the image in the database
        }
    
        // Update the banner's page name
        $banner->page_name = $request->page_name;
        $banner->save();
    
        return redirect()->route('page-banners.index')->with('success', 'Banner updated successfully!');
    }
    

    // Remove the specified banner
    public function destroy($id)
    {
        $banner = PageBanner::find($id);
        if ($banner) {
            $banner->delete();
        }

        return redirect()->route('page-banners.index');
    }
}

