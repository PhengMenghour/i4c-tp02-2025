<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Category Routes
Route::controller(CategoryController::class)->prefix('categories')->group(function () {
    Route::get('/', 'getCategories');        // Get all categories
    Route::post('/', 'createCategory');      // Create a category
    Route::get('/{categoryId}', 'getCategory');  // Get a specific category
    Route::patch('/{categoryId}', 'updateCategory'); // Update a category
    Route::delete('/{categoryId}', 'deleteCategory'); // Delete a category
});

// Product Routes
Route::controller(ProductController::class)->prefix('products')->group(function () {
    Route::get('/', 'index');            // Get all products
    Route::get('/active', 'activeProducts'); // Get active products (ordered, limited to 10)
    Route::get('/{id}', 'show');          // Get a specific product
    Route::post('/', 'store');            // Create a new product
    Route::put('/{id}', 'update');        // Update a product
    Route::delete('/{id}', 'destroy');    // Delete a product
    Route::get('/max-price', 'maxPrice'); // Get the max price of active products
});
