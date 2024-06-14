<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    public function process(Request $request)
    {
        $items = json_decode($request->input('items'), true);
        return view('checkout.index', compact('items'));
    }
}
