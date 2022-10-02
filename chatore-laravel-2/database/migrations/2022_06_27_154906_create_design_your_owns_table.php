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
        Schema::create('design_your_owns', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('user_name')->default('guest');
            $table->string('name');
            $table->string('category');
            $table->string('metal');
            $table->string('size');
            $table->string('description');
            $table->string('stones');
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
        Schema::dropIfExists('design_your_owns');
    }
};
