<?php


namespace App\Http\Controllers;

use App\Models\Appreciation;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Complaint;
use App\Models\Councillor;
use App\Models\ImageGallery;
use App\Models\Suggestion;

class DashboardController extends Controller
{
    public function index()
    {
        $complaintCount = Complaint::count();
        $newComplaintsCount = Complaint::where('status', 'New')->count();
        $assignedComplaintsCount = Complaint::where('status', 'Assigned')->count();
        $inProgressComplaintsCount = Complaint::where('status', 'In Progress')->count();
        $pendingComplaintsCount = Complaint::where('status','Pending')->count();
        $resolvedComplaintsCount = Complaint::where('status','Resolved')->count();
        $reOpenComplaintsCount = Complaint::where('status','Re-Open')->count();
        $closedComplaintsCount = Complaint::where('status','Closed')->count();
        $appreciationCount = Appreciation::count();
        $approvedAppreciationCount = Appreciation::where('status','approved')->count();
        $pendingAppreciationCount = Appreciation::where('status','pending')->count();
        $rejectedAppreciationCount = Appreciation::where('status','rejected')->count();
        $suggestionCount = Suggestion::count();
        $categoriesCount = Category::count();
        $blogsCount = Blog::count();
        $councillorsCount = Councillor::count();
        $eventsCount = ImageGallery::count();

        return view('dashboard', compact('complaintCount','newComplaintsCount','assignedComplaintsCount','inProgressComplaintsCount','pendingComplaintsCount','resolvedComplaintsCount','reOpenComplaintsCount','closedComplaintsCount','appreciationCount','approvedAppreciationCount','pendingAppreciationCount','rejectedAppreciationCount','suggestionCount','categoriesCount','blogsCount','councillorsCount','eventsCount'));
    }
}
