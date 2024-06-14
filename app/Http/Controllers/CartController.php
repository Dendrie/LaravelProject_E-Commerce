<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'shop_id' => 'required|exists:shops,id',
            'product_name' => 'required|string',
            'product_image' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric',
        ]);

        $cartItem = Cart::create([
            'user_id' => Auth::id(),
            'product_id' => $request->product_id,
            'shop_id' => $request->shop_id,
            'product_name' => $request->product_name,
            'product_image' => $request->product_image,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return response()->json(['success' => 'Product added to cart successfully']);
    }

    public function viewCart()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        $combinedItems = [];
        foreach ($cartItems as $item) {
            $productId = $item->product->id;

            if (isset($combinedItems[$productId])) {
                $combinedItems[$productId]->quantity += $item->quantity;
            } else {
                $combinedItems[$productId] = $item;
            }
        }

        return view('cart', ['cartItems' => $combinedItems]);
    }

    public function removeFromCart($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return redirect()->route('cart.view')->with('success', 'Item removed from cart');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cartItem = Cart::findOrFail($id);
        $cartItem->update($request->only('quantity'));

        return redirect()->route('cart.view')->with('success', 'Cart updated successfully');
    }

    public function checkoutProcess(Request $request)
{
    $items = json_decode($request->input('items'), true);
    $total = array_sum(array_map(function ($item) {
        return $item['price'] * $item['quantity'];
    }, $items));

    // Redirect to the place order route with the data
    return redirect()->route('placeorder')->with(['items' => $items, 'total' => $total]);
}
}
// public function order(Request $request)
// {
//     // Validate the incoming request data
//     $request->validate([
//         'shipping_address' => 'required|string|max:255',
//         'payment_method' => 'required|string|in:Credit/debit card,Cash on delivery,GCash,Maya',
//         'shipping_fee' => 'required|numeric|min:0',
//     ]);

//     // Start a database transaction
//     DB::transaction(function () use ($request) {
//         $user = Auth::user(); // Get the currently authenticated user
//         $cartItems = Cart::where('user_id', $user->id)->get(); // Retrieve the user's cart items

//         // Calculate the total price of the cart items
//         $totalPrice = $cartItems->sum(function ($item) {
//             return $item->price * $item->quantity;
//         });

//         // Create a new order record
//         $order = Order::create([
//             'user_id' => $user->id,
//             'shipping_address' => $request->shipping_address,
//             'payment_method' => $request->payment_method,
//             'status' => 'pending',
//             'total_price' => $totalPrice + $request->shipping_fee,
//             'shipping_fee' => $request->shipping_fee,
//             'quantity' => $cartItems->sum('quantity'),
//         ]);

//         // Create order items for each cart item
//         foreach ($cartItems as $item) {
//             OrderItem::create([
//                 'order_id' => $order->id,
//                 'product_id' => $item->product_id,
//                 'quantity' => $item->quantity,
//                 'price' => $item->price,
//                 'product_name' => $item->product_name,
//                 'product_image' => $item->product_image,
//             ]);
//         }

//         // Clear the cart for the user
//         Cart::where('user_id', $user->id)->delete();
//     });

//     // Redirect to the orders index page with a success message
//     return redirect()->route('orders.index')->with('success', 'Checkout successful');
// }
    

