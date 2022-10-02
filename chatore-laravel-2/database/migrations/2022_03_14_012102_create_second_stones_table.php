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
        Schema::create('second_stones', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->nullable();
            $table->string('second_stone_type')->nullable();
            $table->string('second_stone_color')->nullable();
            $table->decimal('second_stone_carat')->nullable();
            $table->decimal('second_stone_mm')->nullable();
            $table->decimal('second_stone_gr')->nullable();
            $table->string('second_stone_clarity')->nullable();
            $table->string('second_stone_cut')->nullable();
            $table->string('second_stone_shape');
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
        Schema::dropIfExists('second_stones');
    }
};
