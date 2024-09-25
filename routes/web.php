<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\ProductController;
Route::get('/', function () {
    return view('welcome');

});

// Category Routes
Route::resource('categories', CategoryController::class);

// Questions Routes
Route::get('categories/{category}/questions/create', [QuestionController::class, 'create'])->name('questions.create');
Route::post('categories/{category}/questions', [QuestionController::class, 'store'])->name('questions.store');

// Product Routes
Route::resource('products', ProductController::class);
Route::get('categories/{category}/questions', [ProductController::class, 'loadQuestions']);


Route::resource('questions', QuestionController::class);

Route::get('/categories/{categoryId}/questions', [QuestionController::class, 'index'])->name('questions.index');

Route::get('/questions/{id}', [QuestionController::class, 'show'])->name('questions.show');



