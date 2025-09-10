<?php

namespace App\Http\Controllers;

use App\Models\Appreciation;
use Illuminate\Http\Request;

class AppreciationController extends Controller
{
    public function index()
    {
        $appreciations = Appreciation::all();  // All Appreciations
        return view('admin.appreciations.index', compact('appreciations'));
    }

    public function updateStatus(Request $request)
    {
        try {
            // Check if request contains id and status
            if (!$request->has('id') || !$request->has('status')) {
                return response()->json(['message' => 'Invalid request data'], 400);
            }
    
            // Log request data to ensure it's coming correctly
            \Log::info("Request data: ", $request->all());
    
            // Fetch the screenshot record
            $appreciation = Appreciation::find($request->id);
    
            // Check if record exists
            if (!$appreciation) {
                return response()->json(['message' => 'Appreciation not found'], 404);
            }
    
            // Update status
            $appreciation->status = $request->status;
            $appreciation->save();
    
            return response()->json(['message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            // Log the exact error for debugging
            \Log::error("Error updating status: " . $e->getMessage());
            return response()->json(['message' => 'Failed to update status'], 500);
        }
    }

    public function checkStatus($id)
    {
        $appreciation = Appreciation::findOrFail($id);  // Fetch the complaint by ID
        return view('admin.appreciations.status', compact('appreciation'));  // Return the view with complaint data
    }
}
