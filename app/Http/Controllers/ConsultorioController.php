<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
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
        return view('admin.consultorios.show', compact('consultorio'));
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
    public function destroy($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        $consultorio->delete();

        return redirect()->route('admin.consultorios.index')
            ->with('mensaje', 'Se eliminó el consultorio correctamente')
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
}
