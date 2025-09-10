<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Suggestion;
use Illuminate\Http\Request;

class SuggestionController extends Controller
{
    // Constructor to apply middleware if needed
    // public function __construct()
    // {
    //     $this->middleware('auth'); // You can restrict access to authenticated users
    // }

    // Function to show all suggestions (admin side view)
    public function index()
    {
        $suggestions = Suggestion::with('department')->get(); // Fetch all suggestions

        return view('admin.suggestions.index', compact('suggestions'));
    }

    // Function to view a single suggestion's details
    public function show($id)
    {
        $suggestion = Suggestion::findOrFail($id);

        return view('admin.suggestions.show', compact('suggestion'));
    }

    // // Function to update the status of a suggestion
    // public function updateStatus(Request $request, $id)
    // {
    //     $request->validate([
    //         'status' => 'required|in:New,Assigned,In Progress,Pending,Resolved,Re-Open,Closed',
    //     ]);

    //     $suggestion = Suggestion::findOrFail($id);
    //     $suggestion->status = $request->status;
    //     $suggestion->save();

    //     return redirect()->route('admin.suggestions.index')->with('success', 'Status updated successfully');
    // }
}
