<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    // Display a list of holidays
    public function index()
    {
        // Fetch all holidays
        $holidays = Holiday::all();
        return view('admin.holidays.list', compact('holidays'));
    }

    // Show the form to create a new holiday
    public function create()
    {
        // Passing null for create view as no record is selected yet
        return view('admin.holidays.form');
    }

    // Store a newly created holiday
    // public function store(Request $request)
    // {
    //     // Validate the request data
    //     $validated = $request->validate([
    //         'event_name' => 'required|string|max:255',
    //         'holiday_type' => 'required|in:single,range', 
    //     ]);

    //     if ($request->holiday_type === 'single') {
    //         $validated['date'] = $request->date;
    //         $validated['start_date'] = null;
    //         $validated['end_date'] = null;
    //     }

    //     // If range date, store start and end dates
    //     if ($request->holiday_type === 'range') {
    //         $validated['start_date'] = $request->start_date;
    //         $validated['end_date'] = $request->end_date;
    //         $validated['date'] = null;
    //     }

    //      // Calculate the day based on the date (for single date or start date)
    //      $date = $request->holiday_type === 'single' ? $request->date : $request->start_date;
    //      $validated['day'] = \Carbon\Carbon::parse($date)->format('l');

    //     // Create a new holiday record
    //     Holiday::create($validated);

    //     // Redirect back to the holidays index page with success message
    //     return redirect()->route('holidays.index')->with('success', 'Holiday added successfully!');
    // }

    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'holiday_type' => 'required|in:single,range',
        ]);

        if ($request->holiday_type === 'single') {
            // For single date, store the selected date and calculate the day
            $validated['date'] = $request->date;
            $validated['start_date'] = null;
            $validated['end_date'] = null;
            $validated['day'] = Carbon::parse($request->date)->format('l');
        } elseif ($request->holiday_type === 'range') {
            // For date range, store the range in the 'date' column
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // Combine start and end date in a readable format
            $validated['date'] = "{$startDate} to {$endDate}";
            $validated['start_date'] = $startDate;
            $validated['end_date'] = $endDate;

            // Optional: Store the day range if needed
            $startDay = Carbon::parse($startDate)->format('l');
            $endDay = Carbon::parse($endDate)->format('l');
            $validated['day'] = "{$startDay} to {$endDay}";
        }

        // Create the holiday entry in the database
        Holiday::create($validated);

        // Redirect to holidays index with a success message
        return redirect()->route('holidays.index')->with('success', 'Holiday added successfully!');
    }





    // Show the form to edit an existing holiday
    public function edit($id)
    {
        // Find the holiday by ID
        $holiday = Holiday::findOrFail($id);

        // Return the edit view with the holiday data
        return view('admin.holidays.form', compact('holiday'));
    }

    // Update an existing holiday
    public function update(Request $request, $id)
    {
        // Validate the request
        $validated = $request->validate([
            'event_name' => 'required|string|max:255',
            'holiday_type' => 'required|in:single,range',
        ]);

        // Find the existing holiday entry
        $holiday = Holiday::findOrFail($id);

        if ($request->holiday_type === 'single') {
            // For single date, update the selected date and calculate the day
            $validated['date'] = $request->date;
            $validated['start_date'] = null;
            $validated['end_date'] = null;
            $validated['day'] = Carbon::parse($request->date)->format('l');
        } elseif ($request->holiday_type === 'range') {
            // For date range, update the start and end date
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // Combine start and end date in a readable format for the 'date' column
            $validated['date'] = "{$startDate} to {$endDate}";
            $validated['start_date'] = $startDate;
            $validated['end_date'] = $endDate;

            // Optional: Store the day range if needed
            $startDay = Carbon::parse($startDate)->format('l');
            $endDay = Carbon::parse($endDate)->format('l');
            $validated['day'] = "{$startDay} to {$endDay}";
        }

        // Update the holiday entry in the database
        $holiday->update($validated);

        // Redirect to holidays index with a success message
        return redirect()->route('holidays.index')->with('success', 'Holiday updated successfully!');
    }


    // Delete a holiday
    public function destroy($id)
    {
        // Find the holiday by ID
        $holiday = Holiday::findOrFail($id);

        // Delete the holiday record
        $holiday->delete();

        // Redirect back to the holidays index page with success message
        return redirect()->route('holidays.index')->with('success', 'Holiday deleted successfully!');
    }
}
