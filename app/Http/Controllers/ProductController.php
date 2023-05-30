<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->get();
        return view('product.all', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "pName" => "required|min:3",
            "pPrice" => "required|gt:10",
            "pQuantity" => "required|gt:0",
            "pDescription" => "required|min:10"
        ]);
        Product::create([
            "name" => $request->pName,
            "description" => $request->pDescription,
            "price" => $request->pPrice,
            "quantinty" => $request->pQuantity
        ]);
        return redirect()->route('product.index')->with('success', "Product created");
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('home');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            "pName" => "required|min:3",
            "pPrice" => "required|gt:10",
            "pQuantity" => "required|gt:0",
            "pDescription" => "required|min:10"
        ]);
        $product->update([
            "name" => $request->pName,
            "description" => $request->pDescription,
            "price" => $request->pPrice,
            "quantinty" => $request->pQuantity
        ]);
        return redirect()->route('product.index')->with('success', "Product updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back()->with('success', "Product removed successfully");
    }
}
