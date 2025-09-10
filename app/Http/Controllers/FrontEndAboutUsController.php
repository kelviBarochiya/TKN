<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use App\Models\Holiday;
use App\Models\Department;
use App\Models\PageBanner;
use App\Models\PageContent;
use App\Models\AboutUsImage;
use Illuminate\Http\Request;
use App\Models\AdministrativeOfficer;
use App\Models\Councillor;

class FrontEndAboutUsController extends Controller
{
    public function index(Request $request)
    {
        $aboutUs = AboutUs::first(); // Assuming you want the first record (or adjust as needed)
        $aboutUs = AboutUs::with('images')->get(); // Fetch all AboutUs records
        $officers = AdministrativeOfficer::all();
        $holidays = Holiday::all();
        $missionContent = PageContent::where('name', 'Mission')
            ->first();
        $visionContent = PageContent::where('name', 'Vision')
            ->first();
        $departments  = Department::all();
        $pageBanner = PageBanner::where('page_name', 'about-us')->first();

        // Get the selected month from the request
        $selectedMonth = $request->input('month');

        // If a month is selected, filter holidays by that month
        if ($selectedMonth) {
            $holidays = Holiday::whereMonth('date', $selectedMonth)->get();
        } else {
            // If no month is selected, fetch all holidays
            $holidays = Holiday::all();
        }

        $councillors = Councillor::all();
        return view('front-end.about-us', compact('aboutUs','councillors' ,'officers', 'holidays','missionContent', 'visionContent', 'departments', 'pageBanner'));
    }
}
