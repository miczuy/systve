<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Mostrar el listado de consultorios.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    }

    /**
     * Muestra el formulario para crear un nuevo consultorio.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Almacena un consultorio recién creado en la base de datos.
     */
    public function store(Request $request)
    {
        // Validación de los datos ingresados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'telefono' => 'nullable|string|max:15',
            'especialidad' => 'required|string|max:255',
        ]);

        // Crear el consultorio con los datos validados
        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se registró el consultorio correctamente')
            ->with('icono', 'success');
    }

    /**
     * Muestra los detalles de un consultorio específico.
     */
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);

        // Obtener horarios asignados a este consultorio
        $horarios = Horario::with('doctor')
            ->where('consultorio_id', $id)
            ->orderBy('dia')
            ->orderBy('hora_inicio')
            ->get();

        // Obtener citas programadas (eventos) para este consultorio
        $fechaActual = Carbon::now()->startOfDay();
        $fechaLimite = Carbon::now()->addDays(30)->endOfDay(); // Próximos 30 días

        $eventos = Event::with(['doctor', 'user'])
            ->where('consultorio_id', $id)
            ->whereIn('estado', ['pendiente', 'atendida']) // Solo mostrar citas activas
            ->whereBetween('start', [$fechaActual, $fechaLimite])
            ->orderBy('start')
            ->get();

        // Organizar eventos por fecha
        $eventosPorFecha = [];
        foreach ($eventos as $evento) {
            $fecha = $evento->start->format('Y-m-d');
            if (!isset($eventosPorFecha[$fecha])) {
                $eventosPorFecha[$fecha] = [];
            }
            $eventosPorFecha[$fecha][] = $evento;
        }

        // Calcular disponibilidad actual (basada en los horarios y eventos)
        $disponibilidad = $this->calcularDisponibilidad($horarios, $eventosPorFecha);

        return view('admin.consultorios.show', compact(
            'consultorio',
            'horarios',
            'eventos',
            'eventosPorFecha',
            'disponibilidad'
        ));
    }

    /**
     * Calcula la disponibilidad del consultorio basado en horarios y eventos.
     */
    private function calcularDisponibilidad($horarios, $eventosPorFecha)
    {
        $disponibilidad = [
            'total_horas_semanales' => 0,
            'horas_ocupadas_proximos_dias' => 0,
            'porcentaje_ocupacion' => 0,
        ];

        // Calcular horas semanales disponibles según horarios
        foreach ($horarios as $horario) {
            $horaInicio = Carbon::parse($horario->hora_inicio);
            $horaFin = Carbon::parse($horario->hora_fin);
            $horasDiarias = $horaFin->diffInHours($horaInicio);
            $disponibilidad['total_horas_semanales'] += $horasDiarias;
        }

        // Calcular horas ocupadas en próximos días
        foreach ($eventosPorFecha as $fecha => $eventosDelDia) {
            $disponibilidad['horas_ocupadas_proximos_dias'] += count($eventosDelDia);
        }

        // Calcular porcentaje (estimado para los próximos 7 días)
        if ($disponibilidad['total_horas_semanales'] > 0) {
            $horasPosiblesProximaSemana = $disponibilidad['total_horas_semanales'];
            $disponibilidad['porcentaje_ocupacion'] = min(100, round(($disponibilidad['horas_ocupadas_proximos_dias'] / $horasPosiblesProximaSemana) * 100));
        }

        return $disponibilidad;
    }

    /**
     * Muestra el formulario para editar un consultorio.
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    /**
     * Actualiza un consultorio existente en la base de datos.
     */
    public function update(Request $request, $id)
    {
        // Validación de los datos ingresados
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'capacidad' => 'required|integer',
            'telefono' => 'nullable|string|max:15',
            'especialidad' => 'required|string|max:255',
        ]);

        // Actualizar el consultorio con los datos validados
        $consultorio = Consultorio::findOrFail($id);
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se actualizó el consultorio correctamente')
            ->with('icono', 'success');
    }

    /**
     * Muestra la confirmación antes de eliminar un consultorio.
     */
    public function confirmDelete($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }

    /**
     * Elimina un consultorio de la base de datos.
     */
    public function destroy($id) {
        $consultorio = Consultorio::findOrFail($id);

        // En vez de eliminar, cambiar is_active a falso
        $consultorio->is_active = false;
        $consultorio->save();

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Consultorio desactivado correctamente')
            ->with('icono', 'success');
    }

    /**
     * Alterna el estado de activo/inactivo de un consultorio.
     */
    public function toggleEstado(Consultorio $consultorio)
    {
        // Cambiar el estado del consultorio
        $consultorio->is_active = !$consultorio->is_active;
        $consultorio->save();

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'El estado del consultorio fue actualizado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Obtiene los horarios disponibles para un consultorio específico.
     */
    public function getHorarios($id)
    {
        $horarios = Horario::with('doctor')
            ->where('consultorio_id', $id)
            ->orderBy('dia')
            ->orderBy('hora_inicio')
            ->get();

        return response()->json($horarios);
    }

    /**
     * Obtiene las citas programadas para un consultorio específico.
     */
    public function getEventos($id)
    {
        $fechaActual = Carbon::now()->startOfDay();
        $fechaLimite = Carbon::now()->addDays(30)->endOfDay();

        $eventos = Event::with(['doctor', 'user'])
            ->where('consultorio_id', $id)
            ->whereIn('estado', ['pendiente', 'atendida'])
            ->whereBetween('start', [$fechaActual, $fechaLimite])
            ->orderBy('start')
            ->get();

        return response()->json($eventos);
    }
}
