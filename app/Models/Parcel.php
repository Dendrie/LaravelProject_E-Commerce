<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;
    protected $fillable = [
        'shipping_address',
        'payment_method',
        'total_amount',
        'user_name',
        'shop_name',
        'product_name',
        'product_image',
        'quantity',
        'status',
        'contact_number',
    ];
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
}
