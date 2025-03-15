<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Consultorio;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index(){
        $consultorios = Consultorio::all();
        return view('index', compact('consultorios'));
    }

    public function cargar_datos_consultorios($id){
        try{
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            return view('cargar_datos_consultorios',compact('horarios'));
        }catch (\Exception $exception){
            return response ()->json(['mensaje' => 'Error']);
        }
    }

    public function cargar_reserva_doctores($id) {
        try {
            // Filtrar para excluir citas canceladas
            $eventos = Event::where('doctor_id', $id)
                ->where('estado', '!=', 'cancelada') // Solo obtener citas no canceladas
                ->get();

            // Formatear eventos para FullCalendar
            $eventosFormateados = $eventos->map(function($evento) {
                return [
                    'id' => $evento->id,
                    'title' => 'Cita: Dr. ' . ($evento->doctor->nombres ?? ''),
                    'start' => $evento->start,
                    'end' => $evento->end,
                    'color' => '#f97316',
                    // Datos adicionales para el modal
                    'doctor' => ($evento->doctor->nombres ?? '') . ' ' . ($evento->doctor->apellidos ?? ''),
                    'especialidad' => $evento->doctor->specialties->first()->nombre ?? 'Sin especialidad',
                    'consultorio' => $evento->consultorio->nombre ?? '',
                    'ubicacion' => $evento->consultorio->ubicacion ?? '',
                    'hora' => date('h:i A', strtotime($evento->start))
                ];
            });

            return response()->json($eventosFormateados);
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error: ' . $exception->getMessage()], 500);
        }
    }
};

