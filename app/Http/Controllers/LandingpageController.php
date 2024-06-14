<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Shop;

class LandingpageController extends Controller
{
    public function landingpage(){
        return view('landingpage');
    }
    public function loginpage(){
        return view('loginpage');
    }
    public function signuppage(){
        return view('signuppage');
    }
    public function home(){
        return view('home');
    }
    public function cart(){
        return view('cart');
    }
    public function navbar(){
        return view('navbar');
    }
    public function privacy(){
        return view('privacy&policy');
    }
    public function terms(){
        return view('terms&condition');
    }
    public function aboutus(){
        return view('aboutus');
    }
    public function sellreg(){
        return view('sellreg');
    }
    public function sellreg2(){
        return view('sellreg2');
    }
    public function purchased(){
        return view('purchased');
    }
    public function profile(){
        return view('profile');
    }
    public function sellerland(){
        return view('sellerland');
    }
    public function placeOrder(Request $request)
{
    $items = json_decode($request->query('items'), true);

    $detailedItems = [];
    foreach ($items as $item) {
        $product = Product::find($item['product_id']);
        $shop = Shop::find($product->shop_id);

        $detailedItems[] = [
            'shop_name' => $shop->name,
            'product_image' => $product->image,
            'product_name' => $product->name,
            'price' => $product->price,
            'quantity' => $item['quantity'],
            'subtotal' => $product->price * $item['quantity']
        ];
    }

    return view('placeorder', compact('detailedItems'));
}
public function contactus(){
    return view('contactus');
}
public function cookies(){
    return view('cookies');
}
    
public function sellerorders(){
    return view('sellerorders');
}
}
