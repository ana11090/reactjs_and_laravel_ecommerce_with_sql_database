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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('discount_code');
            $table->decimal('discount_procent', 5, 2)->nullable();
            $table->decimal('discount_sum', 5, 2)->nullable();
            $table->string('discount_apply_sale')->nullable();
            $table->string('discount_start')->nullable();
            $table->string('discount_end')->nullable();
            $table->string('discount_apply_for')->nullable();
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
        Schema::dropIfExists('discounts');
    }
};
