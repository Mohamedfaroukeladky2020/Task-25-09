<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Question;
use App\Models\ProductQuestionAnswer;
class ProductController extends Controller
{
    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request) {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->save();

        // Handle dynamic questions
        foreach ($request->questions as $questionId => $answer) {
            $productAnswer = new ProductQuestionAnswer();
            $productAnswer->product_id = $product->id;
            $productAnswer->question_id = $questionId;
            $productAnswer->answer = $answer;
            $productAnswer->save();
        }

        return redirect()->route('products.index');
    }

    public function loadQuestions($categoryId)
    {
        // Retrieve the questions for the selected category
        $questions = Question::where('category_id', $categoryId)->get();

        // Return the questions as a JSON response
        return response()->json($questions);
    }

    public function index()
    {
        // Retrieve all products from the database
        $products = Product::with('category')->get(); // eager loading category

        // Return the view with products
        return view('products.index', compact('products'));

    }

    public function destroy($id)
    {
        // Find the product by its ID
        $product = Product::findOrFail($id);

        // Delete the product
        $product->delete();

        // Redirect back to the products list with a success message
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }

    public function edit($id)
    {
        // Retrieve the product by ID, and if it doesn't exist, throw a 404
        $product = Product::findOrFail($id);

        // Get all categories to display in the category dropdown
        $categories = Category::all();

        // Pass the product and categories to the view
        return view('products.edit', compact('product', 'categories'));
    }

    // Method to update the product
    public function update(Request $request, $id)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Find the product and update it
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->save();

        // Redirect back to the product list with a success message
        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

}
