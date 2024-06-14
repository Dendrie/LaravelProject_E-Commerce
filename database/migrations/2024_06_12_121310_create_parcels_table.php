<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcelsTable extends Migration
{
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {
            $table->id();
            $table->string('shipping_address');
            $table->string('payment_method');
            $table->decimal('total_amount', 10, 2);
            $table->string('user_name');
            $table->string('shop_name');
            $table->string('product_name');
            $table->string('product_image');
            $table->integer('quantity');
            $table->string('status')->default('Preparing Your Order'); 
            $table->string('contact_number'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}
