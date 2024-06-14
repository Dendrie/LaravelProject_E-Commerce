<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ProductCreation extends Controller
{
    public function create()
    {
        $shop = Auth::user()->shop;
        return view('create', compact('shop'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'shipping' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:6048',
        ]);

        $shop = Auth::user()->shop;

        $product = $shop->products()->create([
            'name' => $request->name,
            'category' => $request->category,
            'description' => $request->description,
            'price' => $request->price,
            'shipping' => $request->shipping,
        ]);

        if($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePath = $image->store('product_images', 'public');
                $product->images()->create([
                    'image_path' => $imagePath,
                ]);
            }
        }

        return redirect()->route('products.create')->with('success', 'Product created successfully.');
    }
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully']);
    }
}
