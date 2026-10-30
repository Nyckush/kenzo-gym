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
        Schema::create('rutina_socio', function (Blueprint $table) {
            $table->foreignId('rutina_id')->constrained('rutinas')->cascadeOnDelete();
            $table->foreignId('socio_id')->constrained('socios')->cascadeOnDelete();
            $table->date('fecha_asignacion');
            $table->date('fecha_fin')->nullable();
            $table->string('estado');
            $table->text('observaciones')->nullable();

            $table->primary(['rutina_id', 'socio_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutina_socio');
    }
};
