<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use App\Models\Consultorio;
use App\Models\Enfermera;
use App\Models\Event;
use App\Models\Horario;
use App\Models\Mascota;
use App\Models\Paciente;
use App\Models\Specialty;
use App\Models\User;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $total_usuarios = User::count();
        $total_enfermeras = Enfermera::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();
        $total_eventos = Event::count();
        $total_configuraciones = Configuracione::count();
        $total_mascotas = Mascota::count();

        // Código mejorado para obtener mascotas
        $mascotas = collect();
        if (Auth::check()) {
            // Primero intentamos obtener el paciente directamente
            $paciente = Paciente::where('user_id', Auth::id())->first();

            if ($paciente) {
                // Si encontramos el paciente, obtenemos sus mascotas
                $mascotas = Mascota::where('paciente_id', $paciente->id)
                    ->where('estado', 'Activo')
                    ->get();

                // Debug log
                \Log::info('Paciente encontrado: ' . $paciente->id);
                \Log::info('Mascotas encontradas: ' . $mascotas->count());
            } else {
                \Log::info('No se encontró paciente para el usuario: ' . Auth::id());
            }
        }

        $consultorios = Consultorio::all();
        $doctores = Doctor::with('specialties')->get();
        $eventos = Event::with(['doctor', 'consultorio', 'user'])->get();
        $specialties = Specialty::all();

        return view('admin.index', compact(
            'total_usuarios', 'total_enfermeras', 'total_pacientes',
            'total_consultorios', 'total_doctores', 'total_horarios','total_mascotas',
            'consultorios', 'doctores', 'specialties', 'eventos',
            'total_eventos', 'total_configuraciones', 'mascotas'
        ));
    }

    public function ver_reservas($id){
        $eventos = Event::where('user_id', $id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }
}
