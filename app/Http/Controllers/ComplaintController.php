<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Complaint;
use App\Models\LifeCycle;
use App\Models\CheckStatus;
use Illuminate\Http\Request;
use App\Helpers\CommonHelper;

class ComplaintController extends Controller
{
    // Show all complaints
    public function index()
    {
        $complaints = Complaint::with('department')->get(); // Fetch all complaints
        $lifecycles = LifeCycle::select('name')->get();
        return view('admin.complaints.index', compact('complaints', 'lifecycles'));
    }

    // Show a form to raise a new complaint
    public function create()
    {
        return view('admin.complaints.create');
    }

    // Store a new complaint
    public function store(Request $request)
    {
        $request->validate([
            'mobile_number' => 'required|string',
            'description' => 'required|string',
        ]);

        // Generate a unique complaint ID
        Complaint::create([
            'mobile_number' => $request->mobile_number,
            'description' => $request->description,
            'complaint_id' => 'CMT-' . strtoupper(uniqid()),
            'status' => 'Pending',
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('admin.complaints.index')->with('success', 'Complaint raised successfully');
    }

    public function updateStatus(Request $request)
    {
        try {
            // Check if request contains id and status
            if (!$request->has('id') || !$request->has('status')) {
                return response()->json(['message' => 'Invalid request data'], 400);
            }

            // Log request data to ensure it's coming correctly
            // \Log::info("Request data: ", $request->all());

            // Fetch the screenshot record
            $complaint = Complaint::find($request->id);

            // Check if record exists
            if (!$complaint) {
                return response()->json(['message' => 'Complaint not found'], 404);
            }

            // Update status
            $complaint->status = $request->status;
            $complaint->save();

            return response()->json(['message' => 'Status updated successfully']);
        } catch (\Exception $e) {
            // Log the exact error for debugging
            // \Log::error("Error updating status: " . $e->getMessage());
            return response()->json(['message' => 'Failed to update status'], 500);
        }
    }

    public function checkStatus($id)
    {
        $complaint = Complaint::findOrFail($id);  // Fetch the complaint by ID
        return view('admin.complaints.status', compact('complaint'));  // Return the view with complaint data
    }

    // public function storeComment(Request $request)
    // {
    //     // Validate the input
    //     $request->validate([
    //         'body' => 'required|string',
    //         'complaint_id' => 'required|exists:complaints,id', // Ensure the complaint ID exists in the complaints table
    //     ]);

    //     // Get the complaint using the provided complaint_id
    //     $complaint = Complaint::find($request->complaint_id);

    //     // If the complaint doesn't exist, return an error message
    //     if (!$complaint) {
    //         return redirect()->back()->with('error', 'Complaint not found!');
    //     }

    //     // Get the mobile number associated with this complaint
    //     $mobileNumber = $complaint->mobile_number; // Assuming the 'mobile_number' is stored in the 'complaints' table

    //     // Check if the mobile number exists in the 'check_status' table
    //     $checkStatus = CheckStatus::where('mobile_number', $mobileNumber)->first();

    //     // If check_status exists, use its ID; otherwise, set check_status_id to null or a default value
    //     $check_status_id = $checkStatus ? $checkStatus->id : null;

    //     // Create a new comment and associate it with the complaint
    //     Comment::create([
    //         'body' => $request->body,
    //         'complaint_id' => $complaint->id, // Store the complaint_id (primary key)
    //         'parent_id' => $request->parent_id ?? null, // Optional for replies
    //         'check_status_id' => $check_status_id, // Store the check_status_id from check_status table
    //     ]);

    //     // Redirect back with success message
    //     return redirect()->back()->with('success', 'Comment added successfully!');
    // }

    public function storeComment(Request $request)
    {
        // dd($request->all());

        // Validate the input
        $request->validate([
            'body' => 'required|string',
            'complaint_id' => 'required|exists:complaints,id', // Ensure the complaint ID exists in the complaints table
            // 'check_status_id' => 'nullable|exists:check_status,id',
        ]);
        // Get the complaint using the provided complaint_id
        $complaint = Complaint::find($request->complaint_id);

        // If the complaint doesn't exist, return an error message
        if (!$complaint) {
            return redirect()->back()->with('error', 'Complaint not found!');
        }

        // Get the mobile number associated with this complaint
        $mobileNumber = $complaint->mobile_number; // Assuming 'mobile_number' is stored in the 'complaints' table

        // Check if the mobile number exists in the 'check_status' table
        $checkStatus = CheckStatus::where('mobile_number', $mobileNumber)->first();

        if (isset($request->admin_id)) {
            $check_status_id = $request->admin_id;
        } else {
            $check_status_id = $checkStatus ? $checkStatus->id : null;
        }

        // Check if the logged-in user is an admin
        $isAdmin = 0;  // Default is 0 (not an admin)
        if (auth()->check()) {
            $isAdmin = auth()->user()->is_admin == 1 ? 1 : 0;
        }
        // dd(auth()->user());
        // Create a new comment and associate it with the complaint
        // Comment::create([
        //     'body' => $request->body,
        //     'complaint_id' => $complaint->id, // Store the complaint_id
        //     'parent_id' => $request->parent_id ?? null, // Optional for replies
        //     'check_status_id' => $check_status_id, // Store check_status_id
        //     'is_admin' => $isAdmin, // Set is_admin field based on user role
        // ]);
        \DB::table('comments')->insert([
            'body' => $request->body,
            'complaint_id' => $complaint->id, // Store the complaint_id
            'parent_id' => $request->parent_id ?? null, // Optional for replies
            'check_status_id' => $check_status_id ?? null, // Store check_status_id
            'is_admin' => $isAdmin, // Set is_admin field based on user role
            'created_at' => now(), // Optional, add created_at timestamp
            'updated_at' => now(), // Optional, add updated_at timestamp
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Comment added successfully!');
    }

    public function showComments($id)
    {
        $complaint = Complaint::with(['comments' => function ($query) {
            $query->whereNull('parent_id')->with(['checkstatus', 'replies'])->orderBy('created_at', 'desc'); // Top level comments ko fetch karega
        }])->findOrFail($id);

        // Har top level comment ke nested comments ko recursively fetch karega
        foreach ($complaint->comments as $comment) {
            CommonHelper::getNestedComments($comment);
        }

        return view('admin.complaints.view-comments', compact('complaint'));
    }

    // public function deleteComments($id)
    // {
    //     $comment = Comment::with('replies')->findOrFail($id); // Find the comment and its replies

    //     // Delete all replies recursively
    //     foreach ($comment->replies as $reply) {
    //         $reply->delete(); // Or use recursive function for deep replies
    //     }

    //     // Delete the parent comment
    //     $comment->delete();

    //     return redirect()->back()->with('success', 'Comment and its replies deleted successfully!');
    // }

    public function deleteComments($id)
    {
        // Find the comment by ID
        $comment = Comment::findOrFail($id);

        // Delete the comment
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully!');
    }
}
