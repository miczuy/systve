<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultorio;

class ConsultorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consultorios = [
            [
                'nombre' => 'Medicina Interna Veterinaria',
                'ubicacion' => 'PB',
                'capacidad' => 8,
                'telefono' => '8899001122',
                'especialidad' => 'Medicina Interna Veterinaria',
            ],
            [
                'nombre' => 'Sala de Emergencia',
                'ubicacion' => 'Área de Emergencias',
                'capacidad' => 10,
                'telefono' => '7788990011',
                'especialidad' => 'Emergencias',
            ],

        ];

        foreach ($consultorios as $consultorio) {
            Consultorio::create($consultorio);
        }
    }
}
