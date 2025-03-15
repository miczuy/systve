<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Configuracione;
use App\Models\Horario;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            RoleSeeder::class,         // Primero los roles
            SpecialtySeeder::class,    // Luego las especialidades
            DoctorsTableSeeder::class, // Después los doctores
            EnfermeraSeeder::class,    // Otros seeders
            ConsultorioSeeder::class,
        ]);

        // Crear usuario Administrador
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('admin');

        // Crear usuario Enfermera
        User::create([
            'name' => 'Enfermera',
            'email' => 'enfermera@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('enfermera');

        // Crear usuario Doctor
        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('doctor'); // Este usuario tendrá un ID asignado automáticamente

        // Crear usuario Paciente
        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('paciente');

        // Crear usuario General
        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@admin.com',
            'password' => Hash::make('12345678'),
        ])->assignRole('usuario');

        // Creacion de horarios
        Horario::create([
            'dia' => 'MARTES',
            'hora_inicio' => '08:00:00',
            'hora_fin' => '18:00:00',
            'doctor_id' => '1',
            'consultorio_id' => '1',
        ]);

        Configuracione::create([
            'nombre' => 'Huellitas del corazon',
            'direccion' => 'San agustin del sur',
            'telefono' => '0424.198.4281',
            'correo' => 'Huellitas@gmail.com',
            'logo' => 'logos/UusTqoAPdIw1MqxOF8UcXQGJb3CZDb6kKhayG2OS.png',
        ]);

    }
}

