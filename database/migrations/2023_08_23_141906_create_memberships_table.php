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
        Schema::create('memberships', function (Blueprint $table) {
            $table->id();

            // $table->unsignedBigInteger('id_user');

            $table->enum('type', ['Invitado', 'Semanal', 'Mensual', 'Semestral', 'Anual']);
            $table->enum('plan', ['Sin plan', 'Classic', 'Premium'])->default('Sin plan');
            $table->string('price');
            // $table->boolean('status');
            $table->timestamps();

            // $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memberships');
    }
};
