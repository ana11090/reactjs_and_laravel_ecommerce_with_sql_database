<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('product_name');
            $table->string('product_image_1');
            $table->string('product_size')->nullable();
            $table->string('product_pieces');
            $table->string('product_price');
            $table->string('product_sale')->nullable();
            $table->string('discount_code')->nullable();
            $table->string('product_final_price');
            $table->string('id_address')->nullable();
            $table->string('discount_procent')->nullable();
            $table->string('discount_sum')->nullable();
            $table->string('tracking');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
