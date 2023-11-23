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
        Schema::create('analysis_diet_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('analysis_id');
            $table->unsignedBigInteger('diet_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('analysis_id')->on('analyses')->references('id');
            $table->foreign('diet_id')->on('diets')->references('id');
            $table->foreign('user_id')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis_diet_user');
    }
};
