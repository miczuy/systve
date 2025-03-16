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
        Schema::create('desparasitaciones_mascota', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mascota_id')->constrained()->onDelete('cascade');
            $table->string('medicamento');
            $table->date('fecha_aplicacion');
            $table->date('fecha_proxima')->nullable();
            $table->decimal('peso_aplicacion', 5, 2)->nullable(); // Peso al momento de aplicar
            $table->text('notas')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desparasitaciones_mascota');
    }
};
