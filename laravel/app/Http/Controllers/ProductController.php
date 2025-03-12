<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Retrieve all products
    public function index()
    {
        return ["message" => "Getting list of products"];
    }

    // Retrieve active products (ordered by name, limit 10)
    public function activeProducts()
    {
        $products = Product::where('active', 1)
                           ->orderBy('name')
                           ->take(10)
                           ->get();  
        return response()->json($products);
    }

    // Retrieve a product by ID or fail
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return response()->json($product);
    }

    // Create a new product
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return response()->json($product, 201);
    }

    // Update an existing product
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return response()->json($product);
    }

    // Delete a product by ID
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted successfully']);
    }

    // Get the maximum price of active products
    public function maxPrice()
    {
        $maxPrice = Product::where('active', 1)->max('price');  
        return response()->json(['max_price' => $maxPrice]);
    }
}
