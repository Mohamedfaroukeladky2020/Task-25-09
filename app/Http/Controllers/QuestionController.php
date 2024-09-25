<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    public function create($categoryId)
    {
        // Find the category by ID
        $category = Category::findOrFail($categoryId);

        // Return the view for creating a question and pass the category
        return view('questions.create', compact('category'));
    }

    public function store(Request $request, $categoryId)
    {
        // Validate the form input
        $request->validate([
            'question' => 'required|string|max:255',
            'type' => 'required|in:text,date,select', // Assuming 'type' can be 'text', 'date', or 'select'
            'is_required' => 'sometimes|boolean',
        ]);

        // Create a new question
        $category = Category::findOrFail($categoryId);
        $category->questions()->create([
            'question' => $request->question,
            'type' => $request->type,
            'is_required' => $request->is_required ?? false,
        ]);

        return redirect()->route('categories.index')->with('success', 'Question created successfully');
    }

    public function index($categoryId)
    {
        // Find the category by ID
        $category = Category::findOrFail($categoryId);

        // Retrieve questions related to the category
        $questions = $category->questions; // Assuming this relationship is defined

        // Return a view with the list of questions
        return view('questions.index', compact('category', 'questions'));
    }

    public function show($id)
    {
        // Find the question by ID
        $question = Question::findOrFail($id);

        // Return a view to display the question
        return view('questions.show', compact('question'));
    }



}
