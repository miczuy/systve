<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Enfermera;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class EnfermeraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear el primer usuario y asignarle el rol de enfermera
        $user1 = User::create([
            'name' => 'Irma Zulay',
            'email' => 'irma.zulay@admin.com', // Correo único
            'password' => Hash::make('password123'), // Contraseña por defecto
        ]);
        $user1->assignRole('enfermera'); // Asignar rol de enfermera

        // Crear la primera enfermera asociada al usuario creado
        Enfermera::create([
            'user_id' => $user1->id, // Relación con el usuario
            'nombres' => 'Irma Zulay',
            'apellidos' => 'Guerrero',
            'cedula' => '10348720',
            'fecha_nacimiento' => '1980-05-15',
            'celular' => '5551234567',
            'direccion' => 'San agustin sur la yerbera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        // Crear el segundo usuario y asignarle el rol de enfermera
        $user2 = User::create([
            'name' => 'Yulliek Ortiz',
            'email' => 'yulliek.ortiz@admin.com', // Correo único
            'password' => Hash::make('password123'), // Contraseña por defecto
        ]);
        $user2->assignRole('enfermera'); // Asignar rol de enfermera

        // Crear la segunda enfermera asociada al usuario creado
        Enfermera::create([
            'user_id' => $user2->id, // Relación con el usuario
            'nombres' => 'Yulliek',
            'apellidos' => 'Ortiz',
            'cedula' => '11900986',
            'fecha_nacimiento' => '1992-10-20',
            'celular' => '5559876543',
            'direccion' => 'San agustin sur la yerbera',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
