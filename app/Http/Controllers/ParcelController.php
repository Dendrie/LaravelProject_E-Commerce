<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Parcel;

class ParcelController extends Controller
{
    public function index()
{
    $shop = Auth::user()->shop;
    $parcels = Parcel::where('shop_name', $shop->shop_name)->get();
    return view('orderparcel', ['shop' => $shop, 'parcels' => $parcels]);
}

public function updateStatus(Request $request)
{
    $parcel = Parcel::find($request->parcel_id);
    $parcel->status = $request->status;
    $parcel->save();
    return back();
}

    public function saveOrder(Request $request)
    {
        
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'shippingAddress' => 'required|string|max:255',
            'contactNumber' => 'required|string|max:20',
            'userName' => 'required|string|max:255',
            'shopName' => 'required|string|max:255',
            'productname' => 'required|string|max:255',
            'productimage' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'totalAmount' => 'required|numeric|min:0',
            'paymentMethod' => 'required|string',
        ]);

        // If validation fails, return a response with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            // Insert data into the parcels table
            DB::table('parcels')->insert([
                'shipping_address' => $request->input('shippingAddress'),
                'contact_number' => $request->input('contactNumber'),
                'user_name' => $request->input('userName'),
                'shop_name' => $request->input('shopName'),
                'product_name' => $request->input('productname'),
                'product_image' => $request->input('productimage'),
                'quantity' => $request->input('quantity'),
                'total_amount' => $request->input('totalAmount'),
                'payment_method' => $request->input('paymentMethod'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Redirect to home page with success message
            return redirect()->route('home')->with('success', 'Order placed successfully!');
        } catch (\Exception $e) {
            // Log the error with more details
            Log::error('Order save failed: ' . $e->getMessage(), [
                'shippingAddress' => $request->input('shippingAddress'),
                'contactNumber' => $request->input('contactNumber'),
                'userName' => $request->input('userName'),
                'shopName' => $request->input('shopName'),
                'productname' => $request->input('productname'),
                'productimage' => $request->input('productimage'),
                'quantity' => $request->input('quantity'),
                'totalAmount' => $request->input('totalAmount'),
                'paymentMethod' => $request->input('paymentMethod'),
            ]);

            return redirect()->back()->with('error', 'Failed to place the order. Please try again.');
        }
    }
}
