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
        Schema::create('rutina_ejercicio', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rutina_id')->constrained('rutinas')->cascadeOnDelete();
            $table->foreignId('ejercicio_id')->constrained('ejercicios')->cascadeOnDelete();
            $table->string('dia');
            $table->unsignedInteger('orden');
            $table->unsignedInteger('series');
            $table->string('repeticiones');
            $table->decimal('peso_sugerido', 8, 2)->nullable();
            $table->unsignedInteger('descanso_segundos');
            $table->text('observaciones')->nullable();

            $table->unique(['rutina_id', 'dia', 'orden']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_ejercicio');
    }
};
