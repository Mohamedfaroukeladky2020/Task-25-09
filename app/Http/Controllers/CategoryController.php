<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index() {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create() {
        return view('categories.create');
    }

    public function store(Request $request) {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('categories.index');
    }

    public function edit($id)
{
    $category = Category::findOrFail($id); // Find the category by its ID or return a 404
    return view('categories.edit', compact('category')); // Pass the category to the view
}
public function update(Request $request, $id)
{
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    $category = Category::findOrFail($id); // Find the category by its ID
    $category->name = $request->name; // Update the name
    $category->save(); // Save the changes to the database

    return redirect()->route('categories.index')->with('success', 'Category updated successfully');
}

}
