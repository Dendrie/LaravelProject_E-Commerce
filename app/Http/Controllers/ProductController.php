<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Shop;

class ProductController extends Controller
{
    public function home()
    {
        $mensClothes = Product::where('category', 'Mens Clothes')->get();
        $womensClothes = Product::where('category', 'Womens Clothes')->get();
        $bags = Product::where('category', 'Bags')->get();
        $shoes = Product::where('category', 'Shoes')->get();
        $accessories = Product::where('category', 'Accessories')->get();
        $miscellaneous = Product::where('category', 'Miscellaneous')->get();

        return view('home', compact('mensClothes', 'womensClothes', 'shoes', 'bags', 'accessories', 'miscellaneous'));
    }
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'LIKE', "%{$query}%")->get();

        return response()->json($products);
    }
    
}
