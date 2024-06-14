<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ShopController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }
    public function create()
    {
        $user = Auth::user();

        // Check if the user already has a shop
        if ($user->is_registered_seller) {
            return redirect()->route('products.create')->with('info', 'You already have a shop.');
        }

        return view('shops.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'shop_name' => 'required|string|max:255',
            'pickup_address' => 'required|string',
            'shop_image' => 'nullable|image|max:2048',
        ]);

        $shopImage = null;
        if ($request->hasFile('shop_image')) {
            $shopImage = $request->file('shop_image')->store('shop_images', 'public');
        }

        Shop::create([
            'user_id' => Auth::id(),
            'shop_name' => $request->shop_name,
            'pickup_address' => $request->pickup_address,
            'email' => Auth::user()->email,
            'phone_number' => Auth::user()->contact_number,
            'shop_image' => $shopImage,
        ]);

        $user = Auth::user();
        $this->userService->markUserAsSeller($user);
        return redirect()->route('products.create')->with('success', 'Shop registered successfully.');
    }
}
