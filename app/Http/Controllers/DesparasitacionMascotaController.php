<?php

namespace App\Http\Controllers;

use App\Models\DesparasitacionMascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DesparasitacionMascotaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mascota_id' => 'required|exists:mascotas,id',
            'medicamento' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'fecha_proxima' => 'nullable|date|after:fecha_aplicacion',
            'peso_aplicacion' => 'nullable|numeric|between:0.1,999.99',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('mensaje', 'Por favor, corrija los errores en el formulario')
                ->with('icono', 'error');
        }

        DesparasitacionMascota::create($request->all());

        return redirect()->back()
            ->with('mensaje', 'Desparasitación registrada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DesparasitacionMascota $desparasitacion)
    {
        $validator = Validator::make($request->all(), [
            'medicamento' => 'required|string|max:255',
            'fecha_aplicacion' => 'required|date',
            'fecha_proxima' => 'nullable|date|after:fecha_aplicacion',
            'peso_aplicacion' => 'nullable|numeric|between:0.1,999.99',
            'notas' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('mensaje', 'Por favor, corrija los errores en el formulario')
                ->with('icono', 'error');
        }

        $desparasitacion->update($request->all());

        return redirect()->back()
            ->with('mensaje', 'Desparasitación actualizada correctamente')
            ->with('icono', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DesparasitacionMascota $desparasitacion)
    {
        $desparasitacion->delete();

        return redirect()->back()
            ->with('mensaje', 'Desparasitación eliminada correctamente')
            ->with('icono', 'success');
    }
}
