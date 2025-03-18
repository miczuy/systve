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
        // Primero verificamos si la columna existe
        if (Schema::hasColumn('historials', 'tipo_paciente')) {
            // Modificamos la columna para que solo acepte 'Mascota'
            Schema::table('historials', function (Blueprint $table) {
                $table->dropColumn('tipo_paciente');
            });

            Schema::table('historials', function (Blueprint $table) {
                $table->enum('tipo_paciente', ['Mascota'])->default('Mascota')->after('mascota_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si queremos revertir, volvemos a la versión anterior
        if (Schema::hasColumn('historials', 'tipo_paciente')) {
            Schema::table('historials', function (Blueprint $table) {
                $table->dropColumn('tipo_paciente');
            });

            Schema::table('historials', function (Blueprint $table) {
                $table->enum('tipo_paciente', ['Humano', 'Mascota'])->default('Humano')->after('mascota_id');
            });
        }
    }
};
