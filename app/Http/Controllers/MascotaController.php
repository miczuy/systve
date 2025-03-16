<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mascota::query()->with('paciente');

        // Filtros
        if ($request->has('buscar')) {
            $search = $request->buscar;
            $query->where('nombre', 'LIKE', "%{$search}%")
                ->orWhere('especie', 'LIKE', "%{$search}%")
                ->orWhere('raza', 'LIKE', "%{$search}%")
                ->orWhereHas('paciente', function($q) use ($search) {
                    $q->where('nombres', 'LIKE', "%{$search}%")
                        ->orWhere('apellidos', 'LIKE', "%{$search}%");
                });
        }

        if ($request->has('especie')) {
            $query->where('especie', $request->especie);
        }

        if ($request->has('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->has('paciente_id')) {
            $query->where('paciente_id', $request->paciente_id);
        }

        $mascotas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mascotas.index', compact('mascotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos')->get();
        return view('admin.mascotas.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'paciente_id' => 'required|exists:pacientes,id',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sexo' => 'nullable|in:Macho,Hembra',
            'fecha_nacimiento' => 'nullable|date',
            'peso' => 'nullable|numeric|between:0.1,999.99',
            'caracteristicas_especiales' => 'nullable|string',
            'esterilizado' => 'boolean',
            'microchip' => 'nullable|string|max:255',
            'alergias' => 'nullable|string',
            'condiciones_medicas' => 'nullable|string',
            'medicacion_actual' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|in:Activo,Inactivo,Fallecido',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mascotaData = $request->except('foto');

        // Manejar la subida de la foto si existe
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $rutaFoto = $foto->storeAs('mascotas', $nombreFoto, 'public');
            $mascotaData['foto'] = $rutaFoto;
        }

        $mascota = Mascota::create($mascotaData);

        return redirect()->route('admin.mascotas.show', $mascota)
            ->with('success', 'Mascota registrada correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mascota $mascota)
    {
        $mascota->load(['paciente', 'vacunas', 'desparasitaciones', 'visitas' => function($query) {
            $query->orderBy('fecha_visita', 'desc');
        }]);

        return view('admin.mascotas.show', compact('mascota'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mascota $mascota)
    {
        $pacientes = Paciente::orderBy('apellidos')->get();
        return view('admin.mascotas.edit', compact('mascota', 'pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Mascota $mascota)
    {
        $validator = Validator::make($request->all(), [
            'paciente_id' => 'required|exists:pacientes,id',
            'nombre' => 'required|string|max:255',
            'especie' => 'required|string|max:255',
            'raza' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:255',
            'sexo' => 'nullable|in:Macho,Hembra',
            'fecha_nacimiento' => 'nullable|date',
            'peso' => 'nullable|numeric|between:0.1,999.99',
            'caracteristicas_especiales' => 'nullable|string',
            'esterilizado' => 'boolean',
            'microchip' => 'nullable|string|max:255',
            'alergias' => 'nullable|string',
            'condiciones_medicas' => 'nullable|string',
            'medicacion_actual' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|in:Activo,Inactivo,Fallecido',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $mascotaData = $request->except('foto');

        // Manejar la subida de la foto si existe
        if ($request->hasFile('foto')) {
            // Eliminar foto anterior si existe
            if ($mascota->foto) {
                Storage::disk('public')->delete($mascota->foto);
            }

            $foto = $request->file('foto');
            $nombreFoto = time() . '_' . $foto->getClientOriginalName();
            $rutaFoto = $foto->storeAs('mascotas', $nombreFoto, 'public');
            $mascotaData['foto'] = $rutaFoto;
        }

        $mascota->update($mascotaData);

        return redirect()->route('admin.mascotas.show', $mascota)
            ->with('success', 'Mascota actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mascota $mascota)
    {
        // Verificar si tiene visitas antes de eliminar
        if ($mascota->visitas()->count() > 0) {
            return redirect()->back()
                ->with('error', 'No se puede eliminar la mascota porque tiene historial clínico asociado.');
        }

        // Eliminar foto si existe
        if ($mascota->foto) {
            Storage::disk('public')->delete($mascota->foto);
        }

        $mascota->delete();

        return redirect()->route('admin.mascotas.index')
            ->with('success', 'Mascota eliminada correctamente');
    }

    /**
     * Confirm delete
     */
    public function confirmDelete(Mascota $mascota)
    {
        return view('admin.mascotas.delete', compact('mascota'));
    }

    /**
     * Obtener mascotas por paciente (para selectores dinámicos)
     */
    public function getByPaciente($pacienteId)
    {
        $mascotas = Mascota::where('paciente_id', $pacienteId)
            ->where('estado', 'Activo')
            ->get(['id', 'nombre', 'especie', 'raza']);

        return response()->json($mascotas);
    }
}
