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
        Schema::create('time_activity_products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->date('date_activation_product');
            $table->time('time_activation_product');
            $table->date('date_dezctivation_product')->nullable();
            $table->time('time_dezctivation_product')->nullable();
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
        Schema::dropIfExists('time_activity_products');
    }
};
