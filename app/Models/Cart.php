<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'product_id', 'shop_id', 'product_name', 'product_image', 'quantity', 'price'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
{
    return $this->belongsTo(Product::class, 'product_id');
}

public function shop()
{
    return $this->belongsTo(Shop::class, 'shop_id');
}
public static function getItems()
    {
        return self::where('user_id', Auth::id())->get()->map(function ($cartItem) {
            $product = Product::find($cartItem->product_id);
            return [
                'product_id' => $product->id,
                'product_name' => $product->name,
                'product_image' => $product->image,
                'quantity' => $cartItem->quantity,
                'price' => $product->price,
            ];
        });
}
}