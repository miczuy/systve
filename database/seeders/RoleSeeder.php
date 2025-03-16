<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /// seeder para roles y permisos  admin,secretaria,doctores,pacientes,usuarios
        $admin = Role::create(['name' => 'admin']);
        $enfermera = Role::create(['name' => 'enfermera']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);


        Permission::create(['name' => 'admin.index']);

        // rutas para el admin usuarios.
        Permission::create(['name' => 'admin.usuarios.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.usuarios.destroy'])->syncRoles([$admin]);

        // rutas para el admin configuraciones.
        Permission::create(['name' => 'admin.configuraciones.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.configuraciones.destroy'])->syncRoles([$admin]);

        //Rutas para las Enfermeras.
        Permission::create(['name' => 'admin.enfermeras.index'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.create'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.store'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.show'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.enfermeras.destroy'])->syncRoles([$admin]);

        //Rutas para el admin Paciente.
        Permission::create(['name' => 'admin.pacientes.index'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.create'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.store'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.export-pdf'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.show'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.edit'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.update'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.confirmDelete'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.pacientes.destroy'])->syncRoles([$admin,$enfermera]);

        //Rutas admin consultorios
        Permission::create(['name' => 'admin.consultorios.index'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.create'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.store'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.show'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.edit'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.update'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.confirmDelete'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.consultorios.destroy'])->syncRoles([$admin,$enfermera]);


        //Rutas admin doctores
        Permission::create(['name' => 'admin.doctores.index'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.doctores.create'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.doctores.store'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.doctores.export-pdf'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.doctores.show'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.doctores.edit'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.doctores.update'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.doctores.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.doctores.destroy'])->syncRoles([$admin]);

        //rutas de Admin Horarios
        Permission::create(['name' => 'admin.horarios.index'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.create'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.store'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.show'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.edit'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.update'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.confirmDelete'])->syncRoles([$admin,$enfermera]);
        Permission::create(['name' => 'admin.horarios.destroy'])->syncRoles([$admin,$enfermera]);
        //ajax
        Permission::create(['name' => 'admin.horarios.cargar_datos_consultorios'])->syncRoles([$admin,$enfermera]);

        // Rutas Usuario
        Permission::create(['name' => 'cargar_datos_consultorios'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'cargar_reserva_doctores'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'ver_reservas'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'admin.eventos.create'])->syncRoles([$admin,$usuario]);
        Permission::create(['name' => 'admin.eventos.destroy'])->syncRoles([$admin,$usuario]);

        // Rutas para las reservas
        Permission::create(['name' => 'admin.reservas.reportes'])->syncRoles([$admin]);

        // Nuevas rutas para gestión de eventos
        Permission::create(['name' => 'admin.eventos.atender'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.reservas.pdf_fechas'])->syncRoles([$admin]);

        //rutas de Admin Historial clinico
        Permission::create(['name' => 'admin.historial.index'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.create'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.store'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.exportPdf'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.show'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.edit'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.update'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.confirmDelete'])->syncRoles([$admin,$doctor]);
        Permission::create(['name' => 'admin.historial.destroy'])->syncRoles([$admin,$doctor]);

        // Permisos para el perfil de usuario
        Permission::create(['name' => 'perfil.index'])->syncRoles([$paciente, $usuario]);
        Permission::create(['name' => 'perfil.editar'])->syncRoles([$paciente, $usuario]);
        Permission::create(['name' => 'perfil.actualizar'])->syncRoles([$paciente, $usuario]);
        Permission::create(['name' => 'perfil.cambiar-password'])->syncRoles([$paciente, $usuario]);
        Permission::create(['name' => 'perfil.actualizar-password'])->syncRoles([$paciente, $usuario]);
        Permission::create(['name' => 'ver.perfil.paciente'])->syncRoles([$paciente, $usuario]);

        // Rutas para mascotas
        Permission::create(['name' => 'admin.mascotas.index'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.mascotas.create'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.mascotas.store'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.mascotas.show'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.mascotas.edit'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.mascotas.update'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.mascotas.confirmDelete'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.mascotas.destroy'])->syncRoles([$admin]);
        Permission::create(['name' => 'admin.mascotas.getByPaciente'])->syncRoles([$admin, $doctor, $enfermera]);

        // Rutas para vacunas
        Permission::create(['name' => 'admin.vacunas.store'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.vacunas.update'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.vacunas.destroy'])->syncRoles([$admin, $doctor]);

        // Rutas para desparasitaciones
        Permission::create(['name' => 'admin.desparasitaciones.store'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.desparasitaciones.update'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.desparasitaciones.destroy'])->syncRoles([$admin, $doctor]);

        // Rutas para visitas
        Permission::create(['name' => 'admin.visitas.store'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.visitas.show'])->syncRoles([$admin, $doctor, $enfermera]);
        Permission::create(['name' => 'admin.visitas.update'])->syncRoles([$admin, $doctor]);
        Permission::create(['name' => 'admin.visitas.destroy'])->syncRoles([$admin]);

        // Rutas para el historial por mascota
        Permission::create(['name' => 'admin.historial.porMascota'])->syncRoles([$admin, $doctor]);
    }
}
