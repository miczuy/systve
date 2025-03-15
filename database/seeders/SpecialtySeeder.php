<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialty;

class SpecialtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialties = [
            'Cirugía Veterinaria',
            'Medicina General',
            'Dermatología',
            'Odontología',
            'Cardiología',
            'Oftalmología',
            'Neurología',
            'Oncología',
            'Anestesiología',
            'Terapia Física',
        ];

        foreach ($specialties as $specialty) {
            Specialty::firstOrCreate(['nombre' => $specialty]);
        }
    }
}
