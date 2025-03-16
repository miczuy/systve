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
        Schema::table('historials', function (Blueprint $table) {
            // Agregar relación opcional con mascotas
            $table->unsignedBigInteger('mascota_id')->nullable()->after('doctor_id');
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');

            // Agregar campo para tipo de historial (paciente humano o mascota)
            $table->enum('tipo_paciente', ['Humano', 'Mascota'])->default('Humano')->after('mascota_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('historials', function (Blueprint $table) {
            $table->dropForeign(['mascota_id']);
            $table->dropColumn(['mascota_id', 'tipo_paciente']);
        });
    }
};
