<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;

class PurchaseController extends Controller
{
    public function index()
    {
        $user_name = auth()->user()->user_name;

        $toPayParcels = Parcel::where('user_name', $user_name)
                               ->where('status', 'preparing your order')
                               ->get();

        $toShipParcels = Parcel::where('user_name', $user_name)
                                ->whereIn('status', ['waiting for courier'])
                                ->get();

        $toReceiveParcels = Parcel::where('user_name', $user_name)
                                   ->whereIn('status', ['shipped out', 'in transit'])
                                   ->get();

        $completedParcels = Parcel::where('user_name', $user_name)
                                   ->where('status', 'delivered')
                                   ->get();

        return view('purchased.index', compact('toPayParcels', 'toShipParcels', 'toReceiveParcels', 'completedParcels'));
    }

    public function status($status)
    {
        $user_name = auth()->user()->user_name;

        switch ($status) {
            case 'preparing-your-order':
                $parcels = Parcel::where('user_name', $user_name)
                                  ->where('status', 'preparing your order')
                                  ->get();
                break;
            case 'waiting-for-courier':
                $parcels = Parcel::where('user_name', $user_name)
                                  ->whereIn('status', ['waiting for courier'])
                                  ->get();
                break;
            case 'shipped-out':
                $parcels = Parcel::where('user_name', $user_name)
                                  ->where('status', 'shipped out')
                                  ->get();
                break;
            case 'in-transit':
                $parcels = Parcel::where('user_name', $user_name)
                                  ->where('status', 'in transit')
                                  ->get();
                break;
            case 'delivered':
                $parcels = Parcel::where('user_name', $user_name)
                                  ->where('status', 'delivered')
                                  ->get();
                break;
            default:
                $parcels = collect();
                break;
        }

        return view('purchased.status', compact('parcels', 'status'));
    }
}
