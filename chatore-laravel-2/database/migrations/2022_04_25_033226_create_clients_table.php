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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_email');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->integer('day_of_birth')->nullable();
            $table->string('month_of_birth')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->string('favorite_color')->nullable();
            $table->string('favorite_crystal')->nullable();
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
        Schema::dropIfExists('clients');
    }
};
