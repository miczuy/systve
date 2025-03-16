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
        Schema::create('vacunas_mascota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->string('nombre_vacuna');
            $table->date('fecha_aplicacion');
            $table->date('fecha_proxima')->nullable();
            $table->string('lote')->nullable();
            $table->string('veterinario')->nullable(); // Nombre del veterinario que aplicó
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vacunas_mascota');
    }
};
