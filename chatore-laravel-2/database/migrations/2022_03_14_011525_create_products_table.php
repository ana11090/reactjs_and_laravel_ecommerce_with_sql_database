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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_image_1');
            $table->string('product_image_2');
            $table->string('product_image_3');
            $table->string('product_image_4');
            $table->string('product_language');
            $table->string('product_name');
            $table->string('product_category');
            $table->string('product_collection')->nullable();
            $table->string('product_set_name')->nullable();
            $table->string('product_variation')->nullable();
            $table->string('gender_recommendation')->nullable();
            $table->string('product_cost')->nullable();
            $table->integer('product_price');
            $table->string('product_description')->nullable();
            $table->string('product_state')->default('incomplete');
            $table->string('product_inventory')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
};
