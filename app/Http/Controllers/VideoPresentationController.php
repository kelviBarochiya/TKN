<?php

namespace App\Http\Controllers;

use App\Models\VideoPresentation;
use Illuminate\Http\Request;

class VideoPresentationController extends Controller
{
    // Display the list of video presentations
    public function index()
    {
        $videos = VideoPresentation::all();
        return view('admin.video_presentations.list', compact('videos'));
    }

    // Show the create form
    public function create()
    {
        return view('admin.video_presentations.form');
    }

    // Store the video presentation
    public function store(Request $request)
    {
        $request->validate([
            'youtube_url' => 'required|url',
            'status' => 'required|in:approved,rejected',
        ]);

        VideoPresentation::create($request->all());

        return redirect()->route('video_presentations.index')->with('success', 'Video added successfully!');
    }

    // Show the edit form
    public function edit($id)
    {
        $video = VideoPresentation::findOrFail($id);
        return view('admin.video_presentations.form', compact('video'));
    }

    // Update the video presentation
    public function update(Request $request, $id)
    {
        $request->validate([
            'youtube_url' => 'required|url',
            'status' => 'required|in:approved,rejected',
        ]);

        $video = VideoPresentation::findOrFail($id);
        $video->update($request->all());

        return redirect()->route('video_presentations.index')->with('success', 'video updated successfully!');
    }

    // Delete a video presentation
    public function destroy($id)
    {
        $video = VideoPresentation::findOrFail($id);
        $video->delete();

        return redirect()->route('video_presentations.index')->with('success', 'Video deleted successfully!');
    }
}

