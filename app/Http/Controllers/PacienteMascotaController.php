<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PacienteMascotaController extends Controller
{
    /**
     * Muestra la lista de mascotas del paciente.
     */
    public function index()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            return redirect()->route('home')->with('error', 'No tienes un perfil de paciente configurado');
        }

        $mascotas = Mascota::where('paciente_id', $paciente->id)->get();
        return view('admin.pacientes.mascotas.index', compact('mascotas'));
    }

    /**
     * Muestra el formulario para crear una nueva mascota.
     */
    public function create()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            return redirect()->route('home')->with('error', 'No tienes un perfil de paciente configurado');
        }

        return view('admin.pacientes.mascotas.create');
    }

    /**
     * Almacena una nueva mascota en la base de datos.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            return redirect()->route('home')->with('error', 'No tienes un perfil de paciente configurado');
        }

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

        return redirect()->route('admin.pacientes.mascotas.index') // Cambia por la ruta correspondiente
        ->with('mensaje', 'Se registró la mascota exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Muestra la información detallada de una mascota.
     */
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

        return view('admin.pacientes.mascotas.show', compact('mascota'));
    }

    /**
     * Muestra el formulario para editar una mascota.
     */
    public function edit(Mascota $mascota)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente || $mascota->paciente_id != $paciente->id) {
            return redirect()->route('paciente.mascotas.index')
                ->with('error', 'No tienes permiso para editar esta mascota');
        }

        return view('admin.pacientes.mascotas.edit', compact('mascota'));
    }

    /**
     * Actualiza una mascota específica en la base de datos.
     */
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

        return redirect()->route('admin.pacientes.mascotas.index') // Cambia por la ruta correspondiente
        ->with('mensaje', 'La mascota ha sido actualizada exitosamente.')
            ->with('icono', 'success');
    }

    /**
     * Elimina una mascota específica.
     */
    public function destroy(Mascota $mascota)
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente || $mascota->paciente_id != $paciente->id) {
            return redirect()->route('admin.pacientes.mascotas.index')
                ->with('error', 'No tienes permiso para eliminar esta mascota');
        }

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

            return redirect()->route('admin.pacientes.mascotas.index')
                ->with('mensaje', "Tu mascota {$nombreMascota} ha sido eliminada exitosamente.")
                ->with('icono', 'success');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('mensaje', 'Ocurrió un error al intentar eliminar la mascota. Por favor, inténtalo de nuevo.')
                ->with('icono', 'error');
        }
    }
}
