<?php

namespace App\Http\Controllers;

use App\Models\LifeCycle;
use Illuminate\Http\Request;

class LifeCycleController extends Controller
{

    // function __construct()

    // {

    //      $this->middleware('permission:lifecycle-list|lifecycle-create|lifecycle-edit|lifecycle-delete', ['only' => ['index','show']]);

    //      $this->middleware('permission:lifecycle-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:lifecycle-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:lifecycle-delete', ['only' => ['destroy']]);

    // }

    public function index()
    {
        $lifecycles = LifeCycle::all();
        return view('admin.lifecycles.list', compact('lifecycles'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.lifecycles.form');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0', // Status should be 1 (active) or 0 (inactive)
        ]);

        LifeCycle::create($request->all());

        return redirect()->route('lifecycles.index')->with('success', 'LifeCycles created successfully!');
    }

    // Show the form for editing an existing category
    public function edit($id)
    {
        $lifecycle = LifeCycle::findOrFail($id);
        return view('admin.lifecycles.form', compact('lifecycle'));
    }

    // Update an existing category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        $lifecycle = LifeCycle::findOrFail($id);
        $lifecycle->update($request->all());

        return redirect()->route('lifecycles.index')->with('success', 'LifeCycle updated successfully!');
    }

    // Delete a category
    public function destroy($id)
    {
        $lifecycle = LifeCycle::findOrFail($id);
        $lifecycle->delete();

        return redirect()->route('lifecycles.index')->with('success', 'LifeCycle deleted successfully!');
    }
}
