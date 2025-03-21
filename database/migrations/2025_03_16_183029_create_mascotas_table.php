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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paciente_id')->constrained()->onDelete('cascade');
            $table->string('nombre');
            $table->string('especie');                // Perro, Gato, Ave, etc.
            $table->string('raza')->nullable();       // Raza específica
            $table->string('color')->nullable();      // Color principal
            $table->enum('sexo', ['Macho', 'Hembra'])->nullable();
            $table->date('fecha_nacimiento')->nullable();
            $table->decimal('peso', 5, 2)->nullable(); // Peso en kg
            $table->text('caracteristicas_especiales')->nullable(); // Marcas, características distintivas
            $table->boolean('esterilizado')->default(false);
            $table->string('microchip')->nullable();  // Número de microchip si tiene
            $table->text('alergias')->nullable();     // Alergias conocidas
            $table->text('condiciones_medicas')->nullable(); // Condiciones médicas crónicas
            $table->text('medicacion_actual')->nullable(); // Medicamentos actuales
            $table->string('foto');       // Ruta a la foto de la mascota
            $table->enum('estado', ['Activo', 'Inactivo', 'Fallecido'])->default('Activo');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
