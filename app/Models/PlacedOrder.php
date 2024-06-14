<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlacedOrder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'address', 'payment_method', 'total_amount'];

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
}
