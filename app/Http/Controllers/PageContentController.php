<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use Illuminate\Http\Request;

class PageContentController extends Controller
{
   // Show the list of banners
    public function index()
    {
        $banners = PageContent::all(); // Fetch all banners
        return view('admin.page_content.list', compact('banners'));
    }

    // Show the form for creating a new banner
    public function create()
    {
        $pages = ['about-us','projects', 'contact-us','services','projects','term-conditon','privacy-policy    ']; 
        return view('admin.page_content.form', compact('pages'));
    }

    // Store a newly created banner
    public function store(Request $request)
    {
        $request->validate([
            'page_name' => 'required',
            'description' => 'required'
        ]);


        // Store the data
        PageContent::create([
            'module' => $request->page_name,
            'title' => $request->title,
            'description' => $request->description
        ]);
    
        return redirect()->route('page-contents.index')->with('success', 'Page Content created successfully!');
    }
    
    // Show the form for editing the specified banner
    public function edit($id)
    {
        $banner = PageContent::findOrFail($id);
        $pages = ['about-us', 'blog', 'blog-details','mission-vission','contact', 'gallery','gallery-images','video']; // Define pages for selection
        return view('admin.page_content.form', compact('banner', 'pages'));
    }

    // Update the specified banner
    public function update(Request $request)
    {
       $request->validate([
            'page_name' => 'required',
            'description' => 'required'
        ]);


        // Store the data
       
        $id = $request->id;
        $banner = PageContent::findOrFail($id);
    
        // Update the banner's page name
        $banner->module = $request->page_name;
        $banner->title = $request->title;
        $banner->description = $request->description;
        $banner->save();
    
        return redirect()->route('page-contents.index')->with('success', 'Page Content updated successfully!');
    }
    

    // Remove the specified banner
    public function destroy($id)
    {
        $banner = PageContent::find($id);
        if ($banner) {
            $banner->delete();
        }

        return redirect()->route('page-contents.index');
    }
}

