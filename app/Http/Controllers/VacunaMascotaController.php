<?php

namespace App\Http\Controllers;

use App\Models\VacunaMascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VacunaMascotaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mascota_id' => 'required|exists:mascotas,id',
            'nombre_vacuna' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'fecha_proxima' => 'nullable|date|after:fecha_aplicacion',
            'lote' => 'nullable|string|max:255',
            'veterinario' => 'nullable|string|max:255',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        VacunaMascota::create($request->all());

        return redirect()->back()
            ->with('success', 'Vacuna registrada correctamente');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VacunaMascota $vacuna)
    {
        $validator = Validator::make($request->all(), [
            'nombre_vacuna' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'fecha_proxima' => 'nullable|date|after:fecha_aplicacion',
            'lote' => 'nullable|string|max:255',
            'veterinario' => 'nullable|string|max:255',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $vacuna->update($request->all());

        return redirect()->back()
            ->with('success', 'Vacuna actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VacunaMascota $vacuna)
    {
        $vacuna->delete();

        return redirect()->back()
            ->with('success', 'Vacuna eliminada correctamente');
    }
}
