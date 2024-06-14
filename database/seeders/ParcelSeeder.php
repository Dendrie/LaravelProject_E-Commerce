<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ParcelSeeder extends Seeder
{
    public function run()
    {
        DB::table('parcels')->insert([
            'shipping_address' => 'Pogo, Alaminos City',
            'contact_number' => '09955334893',
            'user_name' => 'Noemi Peralta',
            'shop_name' => 'Happy Paw',
            'product_name' => 'Pedigree Adult',
            'product_image' => 'https://example.com/pedigree.jpg',
            'quantity' => 1,
            'total_amount' => 159.00,
            'payment_method' => 'Cash on Delivery',
            'status' => 'Shipped Out',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
