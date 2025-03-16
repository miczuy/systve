<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Historial;
use App\Http\Controllers\Controller;
use App\Models\Mascota;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Historial::with('paciente', 'doctor', 'mascota');

        // Filtrar por tipo_paciente
        if ($request->has('tipo')) {
            $query->where('tipo_paciente', $request->tipo);
        }

        // Filtrar por paciente
        if ($request->has('paciente_id')) {
            $query->where('paciente_id', $request->paciente_id);
        }

        // Filtrar por mascota
        if ($request->has('mascota_id')) {
            $query->where('mascota_id', $request->mascota_id);
        }

        // Filtrar por doctor
        if ($request->has('doctor_id')) {
            $query->where('doctor_id', $request->doctor_id);
        }

        // Filtrar por fecha
        if ($request->has('fecha_desde')) {
            $query->whereDate('fecha_visita', '>=', $request->fecha_desde);
        }

        if ($request->has('fecha_hasta')) {
            $query->whereDate('fecha_visita', '<=', $request->fecha_hasta);
        }

        $historiales = $query->orderBy('fecha_visita', 'desc')->paginate(15);
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        $mascotas = Mascota::where('estado', 'Activo')->get();
        return view('admin.historial.create', compact('pacientes', 'doctores', 'mascotas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'detalle' => 'required|string',
            'fecha_visita' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
            'tipo_paciente' => 'required|in:Humano,Mascota',
            'paciente_id' => 'required_if:tipo_paciente,Humano|exists:pacientes,id',
            'mascota_id' => 'required_if:tipo_paciente,Mascota|exists:mascotas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Si es tipo mascota, obtenemos el paciente_id desde la mascota
        if ($request->tipo_paciente === 'Mascota') {
            $mascota = Mascota::findOrFail($request->mascota_id);
            $data['paciente_id'] = $mascota->paciente_id;
        } else {
            // Si es humano, mascota_id es nulo
            $data['mascota_id'] = null;
        }

        Historial::create($data);

        return redirect()->route('admin.historial.index')
            ->with('success', 'Historial creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Historial $historial)
    {
        $historial->load(['paciente', 'doctor', 'mascota']);
        return view('admin.historial.show', compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Historial $historial)
    {
        $pacientes = Paciente::all();
        $doctores = Doctor::all();
        $mascotas = Mascota::where('estado', 'Activo')->get();

        return view('admin.historial.edit', compact('historial', 'pacientes', 'doctores', 'mascotas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Historial $historial)
    {
        $validator = Validator::make($request->all(), [
            'detalle' => 'required|string',
            'fecha_visita' => 'required|date',
            'doctor_id' => 'required|exists:doctors,id',
            'tipo_paciente' => 'required|in:Humano,Mascota',
            'paciente_id' => 'required_if:tipo_paciente,Humano|exists:pacientes,id',
            'mascota_id' => 'required_if:tipo_paciente,Mascota|exists:mascotas,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // Si es tipo mascota, obtenemos el paciente_id desde la mascota
        if ($request->tipo_paciente === 'Mascota') {
            $mascota = Mascota::findOrFail($request->mascota_id);
            $data['paciente_id'] = $mascota->paciente_id;
        } else {
            // Si es humano, mascota_id es nulo
            $data['mascota_id'] = null;
        }

        $historial->update($data);

        return redirect()->route('admin.historial.index')
            ->with('success', 'Historial actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Historial $historial)
    {
        $historial->delete();

        return redirect()->route('admin.historial.index')
            ->with('success', 'Historial eliminado correctamente');
    }

    /**
     * Ver historial por mascota
     */
    public function porMascota(Mascota $mascota)
    {
        $historiales = Historial::with('doctor')
            ->where('mascota_id', $mascota->id)
            ->orderBy('fecha_visita', 'desc')
            ->paginate(10);

        return view('admin.historial.por_mascota', compact('historiales', 'mascota'));
    }
}
