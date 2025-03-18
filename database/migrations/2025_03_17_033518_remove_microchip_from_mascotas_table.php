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
        // Verificamos si la columna existe
        if (Schema::hasColumn('mascotas', 'microchip')) {
            Schema::table('mascotas', function (Blueprint $table) {
                $table->dropColumn('microchip');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Si queremos revertir, volvemos a añadir la columna
        if (!Schema::hasColumn('mascotas', 'microchip')) {
            Schema::table('mascotas', function (Blueprint $table) {
                $table->string('microchip')->nullable()->after('esterilizado');
            });
        }
    }
};
