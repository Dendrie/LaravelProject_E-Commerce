<?php

namespace App\Models;
use App\Http\Controllers\ShopController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'shop_name',
        'pickup_address',
        'email',
        'phone_number',
        'shop_image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function products()
{
    return $this->hasMany(Product::class, 'shop_id');
}
}
