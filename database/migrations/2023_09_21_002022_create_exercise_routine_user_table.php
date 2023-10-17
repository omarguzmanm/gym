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
        Schema::create('exercise_routine_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('routine_id');
            $table->unsignedBigInteger('exercise_id');
            $table->integer('sets')->default(4);
            $table->integer('reps')->default(12);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('routine_id')->references('id')->on('routines');
            $table->foreign('exercise_id')->references('id')->on('exercises');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exercise_routine_user');
    }
};
