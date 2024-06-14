<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlacedOrder;
use App\Models\OrderItem;

class PlacedOrderController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'shippingAddress' => 'required|string|max:255',
            'paymentMethod' => 'required|string',
            'items' => 'required|string', // Assuming items are passed as JSON string
        ]);

        // Create a new order instance
        $order = new PlacedOrder();
        $order->user_id = auth()->user()->id;
        $order->address = $request->input('shippingAddress');
        $order->payment_method = $request->input('paymentMethod');
        $order->total_amount = 0; // Will be calculated later
        $order->save();

        // Decode items from request and calculate the total amount
        $items = json_decode($request->input('items'), true);
        $totalAmount = 0;

        foreach ($items as $item) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->id;
            $orderItem->product_id = $item['product_id'];
            $orderItem->product_name = $item['product_name'];
            $orderItem->product_image = $item['product_image'];
            $orderItem->price = $item['price'];
            $orderItem->quantity = $item['quantity'];
            $orderItem->save();

            $totalAmount += $item['price'] * $item['quantity'];
        }

        // Update the order with the total amount
        $order->total_amount = $totalAmount;
        $order->save();

        // Redirect to the success page
        return redirect()->route('order.success');
    }
}
