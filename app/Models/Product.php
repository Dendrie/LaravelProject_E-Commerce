<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    protected $fillable = [
    'shop_id',
    'name',
    'category',
    'description',
    'price',
    'shipping',
];

public function shop()
{
    return $this->belongsTo(Shop::class, 'shop_id');
}

public function images()
{
    return $this->hasMany(ProductImage::class);
}
public function carts()
{
    return $this->hasMany(Cart::class);
}
 public function getImagePathAttribute()
    {
        return $this->attributes['image_path'] ? asset('storage/' . $this->attributes['image_path']) : asset('images/default-product.png');
    }
    
}
