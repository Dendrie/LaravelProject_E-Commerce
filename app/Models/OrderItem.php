<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = ['order_id', 'product_id', 'product_name', 'product_image', 'price', 'quantity'];

    public function order()
    {
        return $this->belongsTo(PlacedOrder::class, 'order_id');
    }
}
