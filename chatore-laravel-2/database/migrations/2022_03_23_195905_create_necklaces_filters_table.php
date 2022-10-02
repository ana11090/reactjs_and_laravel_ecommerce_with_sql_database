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
        Schema::create('necklaces_filters', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->string('necklace_filter_lenght')->nullable();
            $table->string('necklance_filter_style')->nullable();
            $table->string('bracelet_filter_gift')->nullable();
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
        Schema::dropIfExists('necklaces_filters');
    }
};
