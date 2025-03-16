<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\VisitaMascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VisitaMascotaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mascota_id' => 'required|exists:mascotas,id',
            'doctor_id' => 'required|exists:doctors,id',
            'specialty_id' => 'nullable|exists:specialties,id',
            'fecha_visita' => 'required|date',
            'hora_visita' => 'required',
            'peso' => 'nullable|numeric|between:0.1,999.99',
            'temperatura' => 'nullable|numeric|between:30,45',
            'motivo_consulta' => 'required|string|max:255',
            'sintomas' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'fecha_seguimiento' => 'nullable|date|after:fecha_visita',
            'estado' => 'required|in:Programada,Completada,Cancelada',
            'crear_historial' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $visita = VisitaMascota::create($request->all());

        // Si la visita está completada y se solicita crear historial
        if ($request->estado === 'Completada' && $request->has('crear_historial') && $request->crear_historial) {
            $visita->toHistorial();
        }

        return redirect()->back()
            ->with('success', 'Visita registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(VisitaMascota $visita)
    {
        $visita->load(['mascota.paciente', 'doctor', 'specialty']);

        return view('admin.visitas.show', compact('visita'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VisitaMascota $visita)
    {
        $validator = Validator::make($request->all(), [
            'doctor_id' => 'required|exists:doctors,id',
            'specialty_id' => 'nullable|exists:specialties,id',
            'fecha_visita' => 'required|date',
            'hora_visita' => 'required',
            'peso' => 'nullable|numeric|between:0.1,999.99',
            'temperatura' => 'nullable|numeric|between:30,45',
            'motivo_consulta' => 'required|string|max:255',
            'sintomas' => 'nullable|string',
            'diagnostico' => 'nullable|string',
            'tratamiento' => 'nullable|string',
            'observaciones' => 'nullable|string',
            'fecha_seguimiento' => 'nullable|date|after:fecha_visita',
            'estado' => 'required|in:Programada,Completada,Cancelada',
            'crear_historial' => 'sometimes|boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar permisos (solo el doctor asignado o un admin pueden modificar)
        $user = Auth::user();
        $doctorId = null;

        if ($user->hasRole('doctor')) {
            $doctorId = $user->doctor->id;
        }

        if (!$user->hasRole('admin') && $visita->doctor_id != $doctorId) {
            return redirect()->back()
                ->with('error', 'No tienes permisos para modificar esta visita');
        }

        $visita->update($request->all());

        // Si la visita está completada y se solicita crear historial
        if ($request->estado === 'Completada' && $request->has('crear_historial') && $request->crear_historial) {
            // Verificar si ya hay un historial para esta visita (buscando por fecha y mascota)
            $historialExistente = Historial::where('mascota_id', $visita->mascota_id)
                ->whereDate('fecha_visita', $visita->fecha_visita)
                ->first();

            if (!$historialExistente) {
                $visita->toHistorial();
            }
        }

        return redirect()->back()
            ->with('success', 'Visita actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VisitaMascota $visita)
    {
        // Verificar permisos (solo admin puede eliminar)
        if (!Auth::user()->hasRole('admin')) {
            return redirect()->back()
                ->with('error', 'No tienes permisos para eliminar esta visita');
        }

        $visita->delete();

        return redirect()->back()
            ->with('success', 'Visita eliminada correctamente');
    }
}
