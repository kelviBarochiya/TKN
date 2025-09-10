<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // function __construct()

    // {

    //      $this->middleware('permission:category-list|category-create|category-edit|category-delete', ['only' => ['index','show']]);

    //      $this->middleware('permission:category-create', ['only' => ['create','store']]);

    //      $this->middleware('permission:category-edit', ['only' => ['edit','update']]);

    //      $this->middleware('permission:category-delete', ['only' => ['destroy']]);

    // }
    // Show the list of categories
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.list', compact('categories'));
    }

    // Show the form for creating a new category
    public function create()
    {
        return view('admin.categories.form');
    }

    // Store a new category
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0', // Status should be 1 (active) or 0 (inactive)
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Category created successfully!');
    }

    // Show the form for editing an existing category
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.categories.form', compact('category'));
    }

    // Update an existing category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|in:1,0',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // Delete a category
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
