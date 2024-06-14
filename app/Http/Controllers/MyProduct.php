<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;

class MyProduct extends Controller
{
    public function myProducts()
{
    $shop = Auth::user()->shop;
    $products = $shop->products()->with('images')->get();

    return view('MyProducts', compact('shop', 'products'));
}
public function getProductDetails($id)
{
    $product = Product::with('images')->find($id);

    if (!$product) {
        return response()->json(['error' => 'Product not found'], 404);
    }

    return response()->json($product);
}



}
