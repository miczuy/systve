<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mascota;
use App\Models\Paciente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MascotaController extends Controller
{
    public function index(Request $request)
    {
        $query = Mascota::query()->with('paciente');

        // Filtros
        if ($request->has('buscar')) {
            $search = $request->buscar;
            $query->where(function($q) use ($search) {
                $q->where('nombre', 'LIKE', "%{$search}%")
                    ->orWhere('especie', 'LIKE', "%{$search}%")
                    ->orWhere('raza', 'LIKE', "%{$search}%")
                    ->orWhereHas('paciente', function($q) use ($search) {
                        $q->where('nombres', 'LIKE', "%{$search}%")
                            ->orWhere('apellidos', 'LIKE', "%{$search}%");
                    });
            });
        }

        if ($request->filled('especie')) {
            $query->where('especie', $request->especie);
        }

        if ($request->filled('estado')) {
            $query->where('estado', $request->estado);
        }

        if ($request->filled('paciente_id')) {
            $query->where('paciente_id', $request->paciente_id);
        }

        $mascotas = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.mascotas.index', compact('mascotas'));
    }

    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos')->get();
        return view('admin.mascotas.create', compact('pacientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
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
            'alergias' => 'nullable|string',
            'condiciones_medicas' => 'nullable|string',
            'medicacion_actual' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|in:Activo,Inactivo,Fallecido',
        ]);

        $mascota = new Mascota(); // Suponiendo que este es el modelo correspondiente

        $mascota->paciente_id = $request->paciente_id;
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->color = $request->color;
        $mascota->sexo = $request->sexo;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->peso = $request->peso;
        $mascota->caracteristicas_especiales = $request->caracteristicas_especiales;
        $mascota->esterilizado = $request->boolean('esterilizado');
        $mascota->alergias = $request->alergias;
        $mascota->condiciones_medicas = $request->condiciones_medicas;
        $mascota->medicacion_actual = $request->medicacion_actual;

        if ($request->hasFile('foto')) {
            $mascota->foto = $request->file('foto')->store('fotos', 'public');
        }

        $mascota->estado = $request->estado;

        $mascota->save();

        return redirect()->route('admin.mascotas.index') // Cambia por la ruta correspondiente
        ->with('mensaje', 'Se registró la mascota exitosamente.')
            ->with('icono', 'success');
    }


    public function show(Mascota $mascota)
    {
        $mascota->load(['paciente', 'vacunas', 'desparasitaciones', 'visitas' => function($query) {
            $query->orderBy('fecha_visita', 'desc');
        }]);

        return view('admin.mascotas.show', compact('mascota'));
    }

    public function edit(Mascota $mascota)
    {
        // Cargar todas las relaciones para poder mostrarlas en la vista de edición
        $mascota->load(['vacunas', 'desparasitaciones', 'visitas' => function($query) {
            $query->orderBy('fecha_visita', 'desc');
        }]);

        $pacientes = Paciente::orderBy('apellidos')->get();
        return view('admin.mascotas.edit', compact('mascota', 'pacientes'));
    }

    public function update(Request $request, Mascota $mascota)
    {
        $request->validate([
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
            'alergias' => 'nullable|string',
            'condiciones_medicas' => 'nullable|string',
            'medicacion_actual' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'estado' => 'required|in:Activo,Inactivo,Fallecido',
        ]);

        // Actualizar los atributos de la mascota
        $mascota->paciente_id = $request->paciente_id;
        $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->raza = $request->raza;
        $mascota->color = $request->color;
        $mascota->sexo = $request->sexo;
        $mascota->fecha_nacimiento = $request->fecha_nacimiento;
        $mascota->peso = $request->peso;
        $mascota->caracteristicas_especiales = $request->caracteristicas_especiales;
        $mascota->esterilizado = $request->boolean('esterilizado');
        $mascota->alergias = $request->alergias;
        $mascota->condiciones_medicas = $request->condiciones_medicas;
        $mascota->medicacion_actual = $request->medicacion_actual;

        // Manejo de la foto: eliminar la anterior y guardar la nueva
        if ($request->hasFile('foto')) {
            if ($mascota->foto && Storage::disk('public')->exists($mascota->foto)) {
                Storage::disk('public')->delete($mascota->foto);
            }
            $mascota->foto = $request->file('foto')->store('mascotas', 'public');
        }

        $mascota->estado = $request->estado;

        $mascota->save();

        return redirect()->route('admin.mascotas.index') // Cambia por la ruta correspondiente
        ->with('mensaje', 'La mascota ha sido actualizada exitosamente.')
            ->with('icono', 'success');
    }


    public function destroy(Mascota $mascota)
    {
        try {
            if ($mascota->visitas()->count() > 0) {
                return redirect()->back()
                    ->with('mensaje', 'No se puede eliminar la mascota porque tiene historial clínico asociado.')
                    ->with('icono', 'error');
            }

            $nombreMascota = $mascota->nombre;

            if ($mascota->foto) {
                Storage::disk('public')->delete($mascota->foto);
            }

            $mascota->delete();

            return redirect()->route('admin.mascotas.index')
                ->with('mensaje', "La mascota {$nombreMascota} ha sido eliminada exitosamente.")
                ->with('icono', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('mensaje', 'Ocurrió un error al intentar eliminar la mascota. Por favor, inténtalo de nuevo.')
                ->with('icono', 'error');
        }
    }

    public function getByPaciente($pacienteId)
    {
        try {
            $mascotas = Mascota::where('paciente_id', $pacienteId)
                ->where('estado', 'Activo')
                ->get(['id', 'nombre', 'especie', 'raza']);

            return response()->json([
                'success' => true,
                'data' => $mascotas
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al obtener las mascotas'
            ], 500);
        }
    }
}
