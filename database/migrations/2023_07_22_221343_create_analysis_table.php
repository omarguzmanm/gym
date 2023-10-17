<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('analysis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('diet_id')->nullable();
            $table->unsignedBigInteger('user_id');

            //Personal information
            // $table->unsignedBigInteger('id_user')->nullable();
            $table->integer('age');
            $table->enum('gender', ['masculino', 'femenino', 'otro']);
            $table->float('weight');
            $table->float('height');
            $table->float('imc');
            $table->enum('activity', ['baja', 'media', 'alta']);

            //Nutrional goals
            $table->enum('goal', ['perdida', 'ganancia', 'mantenimiento', 'mejora', 'otro']);

            //Current habits
            // $table->enum('meal_frecuency', ['baja', 'regular', 'alta']);
            // $table->string('meal_schedule');
            $table->text('regularly_consumed');
            //Medical history (alergias, intolerancias, enfermedades, condiciones)
            $table->text('notes');

            //Lifestyle
            // $table->float('hours_sleep');
            // $table->enum('stress_level', ['bajo', 'medio', 'alto']);
            // $table->enum('substance_use', ['si', 'no']);

            //Hydration level


            // $table->foreign('id_user')->on('users')->references('id');
            $table->foreign('diet_id')->on('diets')->references('id');
            $table->foreign('user_id')->on('users')->references('id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analysis');
    }
};