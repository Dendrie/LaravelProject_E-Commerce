<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'shop_id', 'product_name', 'product_image',  'quantity'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
    
}
