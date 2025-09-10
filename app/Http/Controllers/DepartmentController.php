<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{

    // function __construct()

    // {

    //      $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index','show']]);

    //      $this->middleware('permission:department-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:department-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:department-delete', ['only' => ['destroy']]);

    // }


    public function index()
    {
        $departments = Department::all();
        return view('admin.departments.list', compact('departments'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.departments.form');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'authorized_person_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:1,0', // Status should be 1 (active) or 0 (inactive)
        ]);

        Department::create($request->all());

        return redirect()->route('departments.index')->with('success', 'Department created successfully!');
    }

    // Show the form for editing an existing category
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.departments.form', compact('department'));
    }

    // Update an existing category
    public function update(Request $request, $id)
    {
        $request->validate([
            'department_name' => 'required|string|max:255',
            'authorized_person_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'required|string|max:20',
            'status' => 'required|in:1,0',
        ]);

        $department = Department::findOrFail($id);
        $department->update($request->all());

        return redirect()->route('departments.index')->with('success', 'Department updated successfully!');
    }

    // Delete a category
    public function destroy($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully!');
    }
}
