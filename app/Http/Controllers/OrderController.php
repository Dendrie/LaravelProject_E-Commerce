<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Parcel;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $user = Auth::user();
            $items = json_decode($request->input('items'), true);

            $totalPrice = array_reduce($items, function ($carry, $item) {
                return $carry + ($item['price'] * $item['quantity']);
            }, 0) + 50;

            $order = Order::create([
                'user_id' => $user->id,
                'shipping_address' => $request->input('shipping_address'),
                'payment_method' => $request->input('payment_method'),
                'total_price' => $totalPrice,
            ]);

            foreach ($items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_name' => $item['product_name'],
                    'product_image' => $item['product_image'],
                    'quantity' => $item['quantity'],
                    'price' => $item['price'],
                ]);
            }
        });

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
    public function checkoutProcess(Request $request)
{
    $items = json_decode($request->input('items'), true);
    $total = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $items));

    return redirect()->route('placeorder')->with(['items' => $items, 'total' => $total]);
}

public function placeOrder(Request $request)
    {
        $items = session('items');
        $total = session('total');

        return view('placeorder', compact('items', 'total'));
    }
    public function showCheckout()
{
    // Assuming $cartItems is an array of items in the cart
    $cartItems = Cart::getItems(); // Fetch the cart items from your cart service/model

    // Fetch all product information
    $products = Product::all()->keyBy('id'); // Fetch all products and key by their id for easy lookup

    // Pass both cart items and products to the view
    return view('checkout', [
        'cartItems' => $cartItems,
        'products' => $products,
        'total' => $cartItems->sum(fn($item) => $item['price'] * $item['quantity']) // Calculate the total
    ]);
}
public function indexe()
    {
        $parcels = Parcel::all(); // Fetch all parcels

        $allParcels = $parcels;
        $toPay = $parcels->where('status', 'Preparing Your Order');
        $toShip = $parcels->where('status', 'Waiting for Courier');
        $toReceive = $parcels->whereIn('status', ['Shipped Out', 'In transit']);
        $completed = $parcels->where('status', 'Delivered');

        return view('mypurchased', compact('allParcels', 'toPay', 'toShip', 'toReceive', 'completed'));
    }
}

