<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\AboutUsImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutUsController extends Controller
{
    public function index()
    {
        $aboutUs = AboutUs::with('images')->get();
        return view('admin.about-us.list', compact('aboutUs'));
    }

    public function create()
    {
        return view('admin.about-us.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'required',
            
        ]);
    
        // Create AboutUs record
        $aboutUs = AboutUs::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image in the 'public/images' directory
                $fileName = time() . '_' . $image->getClientOriginalName(); // Unique name for each file
                $image->move(public_path('images'), $fileName); // Save to public/images directory
    
                // Save image path in database
                AboutUsImage::create([
                    'about_us_id' => $aboutUs->id,
                    'image_path' => 'images/' . $fileName, // Save relative path
                ]);
            }
        }
    
        return redirect()->route('about_us.index')->with('success', 'about us added successfully.');
    }

    public function edit($id)
    {
        $aboutUs = AboutUs::with('images')->findOrFail($id);
        return view('admin.about-us.form', compact('aboutUs'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'nullable',
            'description' => 'required',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);
    
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);
    
        // Handle images that were removed
        if ($request->has('removed_images')) {
            $removedImageIds = $request->removed_images;
            foreach ($removedImageIds as $imageId) {
                if ($imageId) {
                    $image = AboutUsImage::findOrFail($imageId);
                    Storage::delete('public/' . $image->image_path); // Delete from storage
                    $image->delete(); // Delete from the database
                }
            }
        }
    
        // Add new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Store each image in the 'public/images' directory
                $fileName = time() . '_' . $image->getClientOriginalName(); // Unique name for each file
                $image->move(public_path('images'), $fileName); // Save to public/images directory
    
                // Save image path in the database
                AboutUsImage::create([
                    'about_us_id' => $aboutUs->id,
                    'image_path' => 'images/' . $fileName, // Save relative path
                ]);
            }
        }
    
        return redirect()->route('about_us.index')->with('success', 'about us updated successfully.');
    }
    
    
    

    public function destroy($id)
    {
        $aboutUs = AboutUs::findOrFail($id);
        $aboutUs->images()->delete();
        $aboutUs->delete();

        return redirect()->route('about_us.index')->with('success', 'about us deleted successfully.');
    }

    public function destroyImage($imageId)
    {
        $image = AboutUsImage::findOrFail($imageId);
        Storage::delete('public/' . $image->image_path);
        $image->delete();

        return back();
    }
}
