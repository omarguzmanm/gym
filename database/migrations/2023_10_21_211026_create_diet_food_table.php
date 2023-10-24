<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('diet_food', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Desayuno, almuerzo, etc.

            $table->unsignedBigInteger('diet_id');
            $table->unsignedBigInteger('food_id');

            $table->foreign('diet_id')->references('id')->on('diets');
            $table->foreign('food_id')->references('id')->on('foods');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diet_food');
    }
};
