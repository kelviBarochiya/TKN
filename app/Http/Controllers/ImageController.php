<?php

namespace App\Http\Controllers;

use App\Models\ImageGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $events = ImageGallery::all();
        return view('admin.gallery.list', compact('events'));
    }

    public function create()
    {
        return view('admin.gallery.form');
    }

    public function edit($id)
    {
        $event = ImageGallery::findOrFail($id);
        return view('admin.gallery.form', compact('event'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_description' => 'nullable|string',
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $uploadedPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->move(public_path('/images'), $fileName);
                $uploadedPaths[] = 'images/' . $fileName; // Save relative path
            }
        }

        ImageGallery::create([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'image_path' => implode(',', $uploadedPaths), // Store paths as comma-separated string
        ]);

        return redirect()->route('events.index')->with('success', 'Images uploaded successfully.');
    }

    public function update(Request $request, $id)
    {
        $event = ImageGallery::findOrFail($id);
    
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_description' => 'nullable|string',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Update event details
        $event->event_name = $request->event_name;
        $event->event_description = $request->event_description;

        // Handle new image uploads
        $uploadedPaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $fileName = time() . '_' . $image->getClientOriginalName();
                $imagePath = $image->move(public_path('/images'), $fileName);
                $uploadedPaths[] = 'images/' . $fileName;
            }
        }
    
        // Merge new and existing images
        $finalImages = array_merge($request->input('existing_images', []), $uploadedPaths);
    
        // Update the slider
        $event->update([
            'event_name' => $request->event_name,
            'event_description' => $request->event_description,
            'image_path' => implode(',', $finalImages),
        ]);
        
        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        $event = ImageGallery::findOrFail($id);
        Storage::disk('public')->delete($event->image_path); // Delete image from storage
        $event->delete(); // Delete from database

        return redirect()->route('events.index')->with('success', 'Gallery deleted successfully!');
    }
}
