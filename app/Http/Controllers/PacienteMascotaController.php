<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PacienteMascotaController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            return redirect()->route('home')->with('error', 'No tienes un perfil de paciente configurado');
        }

        $mascotas = Mascota::where('paciente_id', $paciente->id)->get();
        return view('paciente.mascotas.index', compact('mascotas'));
    }

    public function show(Mascota $mascota)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente || $mascota->paciente_id != $paciente->id) {
            return redirect()->route('paciente.mascotas.index')
                ->with('error', 'No tienes permiso para ver esta mascota');
        }

        $mascota->load(['vacunas', 'desparasitaciones', 'visitas' => function($query) {
            $query->orderBy('fecha_visita', 'desc');
        }]);

        return view('paciente.mascotas.show', compact('mascota'));
    }
}
