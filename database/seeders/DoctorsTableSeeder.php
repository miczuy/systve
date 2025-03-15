<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Specialty; // Asegúrate de importar el modelo Specialty
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el usuario y asignarle el rol correspondiente (user_id = 3)
        $user = User::create([
            'name' => 'Richard Augusto',
            'email' => 'richard.augusto@admin.com', // Correo único
            'password' => Hash::make('password123'), // Contraseña por defecto
        ]);
        $user->assignRole(3); // Asignar el rol con ID 3

        // Crear el doctor asociado al usuario creado
        $doctor = Doctor::create([
            'user_id' => $user->id, // Relación con el usuario
            'nombres' => 'Richard Augusto',
            'apellidos' => 'González',
            'cedula' => 'V-9998287',
            'telefono' => '123456789',
            'licencia_medica' => 'Médico veterinario',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Asegúrate de que la especialidad "Medicina General" exista
        $specialty = Specialty::firstOrCreate(
            ['nombre' => 'Medicina General'] // Cambia 'name' por el campo correspondiente en tu modelo Specialty
        );

        // Asociar la especialidad al doctor
        $doctor->specialties()->attach($specialty->id);
    }
}
