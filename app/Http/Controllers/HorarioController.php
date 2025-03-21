<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Carbon\Carbon;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Obtener solo consultorios activos
        $consultorios = Consultorio::where('is_active', true)->get();
        $horarios = Horario::with('doctor', 'consultorio')->whereHas('doctor.user', function ($query) {$query->where('status', true);})->get();
        return view('admin.horarios.index', compact('horarios','consultorios'));
    }

    public function cargar_datos_consultorios($id){
        try{
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            return view('admin.horarios.cargar_datos_consultorios',compact('horarios'));
        }catch (\Exception $exception){
            return response ()->json(['mensaje' => 'Error']);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Obtener solo consultorios activos
        $consultorios = Consultorio::where('is_active', true)->get();

        $horarios = Horario::with('doctor', 'consultorio')->whereHas('doctor.user', function ($query) {$query->where('status', true);})->get();

        // Obtener solo doctores relacionados con usuarios activos
        $doctores = Doctor::with('specialties')
            ->whereHas('user', function ($query) {
                $query->where('status', true); // Filtrar usuarios activos
            })
            ->get();

        // Pasar los datos a la vista
        return view('admin.horarios.create', compact('consultorios', 'doctores', 'horarios'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'dia' => 'required|string',
            'hora_inicio' => 'required|string',
            'hora_fin' => 'required|string|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        // Convertir las horas de 12 horas a 24 horas usando Carbon
        try {
            $horaInicio = Carbon::createFromFormat('h:i A', $request->hora_inicio);
            $horaFin = Carbon::createFromFormat('h:i A', $request->hora_fin);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->with('error', 'Formato de hora no válido.');
        }

        // Asegurarse de que las conversiones fueron exitosas
        if ($horaInicio && $horaFin) {
            $request->merge([
                'hora_inicio' => $horaInicio->format('H:i'),
                'hora_fin' => $horaFin->format('H:i'),
            ]);
        }

        // Definir el rango de horas permitido
        $horaPermitidaInicio = Carbon::createFromTime(8, 0); // 8:00 AM
        $horaPermitidaFin = Carbon::createFromTime(18, 0);   // 6:00 PM

        // Verificar si las horas están dentro del rango permitido
        if ($horaInicio->lt($horaPermitidaInicio) || $horaFin->gt($horaPermitidaFin)) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'El horario no está dentro del rango permitido (8:00 AM - 6:00 PM).')
                ->with('icono', 'error');
        }

        // Verificar si el horario existe
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id) // Filtrar por consultorio
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario con este día')
                ->with('icono', 'error');
        }

        // Crear el horario si pasa todas las validaciones
        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Se registró el horario correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $horario = Horario::findOrFail($id);

        // Obtener consultorios activos
        $consultorios = Consultorio::where('is_active', true)->get();

        // Obtener doctores con usuarios activos
        $doctores = Doctor::with('specialties')
            ->whereHas('user', function ($query) {
                $query->where('status', true);
            })
            ->get();

        return view('admin.horarios.edit', compact('horario', 'consultorios', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validar los datos del formulario
        $request->validate([
            'dia' => 'required|string',
            'hora_inicio' => 'required',
            'hora_fin' => 'required|after:hora_inicio',
            'consultorio_id' => 'required|exists:consultorios,id',
            'doctor_id' => 'required|exists:doctors,id',
        ]);

        $horario = Horario::findOrFail($id);

        // Determinar el formato de la hora y convertir correctamente
        try {
            // Comprobar si tiene formato AM/PM
            if (strpos($request->hora_inicio, 'AM') !== false ||
                strpos($request->hora_inicio, 'PM') !== false ||
                strpos($request->hora_inicio, 'am') !== false ||
                strpos($request->hora_inicio, 'pm') !== false) {

                $horaInicio = Carbon::createFromFormat('h:i A', $request->hora_inicio);
                $horaFin = Carbon::createFromFormat('h:i A', $request->hora_fin);
            }
            // Si tiene formato de 24 horas (H:i)
            else if (strpos($request->hora_inicio, ':') !== false) {
                $horaInicio = Carbon::createFromFormat('H:i', $request->hora_inicio);
                $horaFin = Carbon::createFromFormat('H:i', $request->hora_fin);
            }
            // Si ninguno de los anteriores funciona, intentar con otro formato común
            else {
                throw new \Exception('Formato de hora no reconocido');
            }
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Formato de hora no válido: ' . $e->getMessage())
                ->with('icono', 'error');
        }

        // Asegurarse de que las conversiones fueron exitosas y normalizar al formato H:i
        $request->merge([
            'hora_inicio' => $horaInicio->format('H:i'),
            'hora_fin' => $horaFin->format('H:i'),
        ]);

        // Resto del código de validación de rango de horas y solapamiento...
        // [mantener el resto de tu código igual]

        // Definir el rango de horas permitido
        $horaPermitidaInicio = Carbon::createFromTime(8, 0); // 8:00 AM
        $horaPermitidaFin = Carbon::createFromTime(18, 0);   // 6:00 PM

        // Verificar si las horas están dentro del rango permitido
        if ($horaInicio->lt($horaPermitidaInicio) || $horaFin->gt($horaPermitidaFin)) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'El horario no está dentro del rango permitido (8:00 AM - 6:00 PM).')
                ->with('icono', 'error');
        }

        // Verificar si el horario existe (excluyendo el horario actual)
        $horarioExistente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id)
            ->where('id', '!=', $id) // Excluir el horario actual
            ->where(function ($query) use ($request) {
                $query->where(function ($query) use ($request) {
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                        ->where('hora_inicio', '<', $request->hora_fin);
                })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_fin', '>', $request->hora_inicio)
                            ->where('hora_fin', '<=', $request->hora_fin);
                    })
                    ->orWhere(function ($query) use ($request) {
                        $query->where('hora_inicio', '<', $request->hora_inicio)
                            ->where('hora_fin', '>', $request->hora_fin);
                    });
            })
            ->exists();

        if ($horarioExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ya existe un horario con este día y rango de horas para este consultorio.')
                ->with('icono', 'error');
        }

        // Actualizar el horario
        $horario->update([
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'doctor_id' => $request->doctor_id,
            'consultorio_id' => $request->consultorio_id
        ]);

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario actualizado correctamente.')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $horario = Horario::findOrFail($id);
        $horario->delete();

        return redirect()->route('admin.horarios.index')
            ->with('mensaje', 'Horario eliminado correctamente.')
            ->with('icono', 'success');
    }
}
