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
        Schema::create('analyses', function (Blueprint $table) {
            $table->id();
            //Personal information
            $table->integer('age');
            $table->enum('gender', ['masculino', 'femenino', 'otro']);
            $table->float('weight');
            $table->float('height');
            $table->float('imc');
            $table->enum('activity', ['Baja', 'Media', 'Alta', 'Super Alta']);
            //Nutrional goals
            $table->string('goal');
            //Current habits
            $table->text('regularly_consumed');
            //Medical history (alergias, intolerancias, enfermedades, condiciones)
            $table->text('notes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('analyses');
    }
};