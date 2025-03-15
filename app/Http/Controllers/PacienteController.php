<?php

namespace App\Http\Controllers;
use App\Models\Configuracione;
use Illuminate\Support\Facades\Validator;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Paciente::query();

        // Búsqueda
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('cedula', 'like', "%{$search}%")
                    ->orWhere('correo', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('direccion', 'like', "%{$search}%");
            });
        }

        $pacientes = $query->paginate(10); // Mantiene los 10 registros por página

        return view('admin.pacientes.index', compact('pacientes'));
    }

    public function exportPdf(Request $request)
    {
        $query = Paciente::query();

        // Aplicar los mismos filtros de búsqueda que en index
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('nombres', 'like', "%{$search}%")
                    ->orWhere('apellidos', 'like', "%{$search}%")
                    ->orWhere('cedula', 'like', "%{$search}%")
                    ->orWhere('correo', 'like', "%{$search}%")
                    ->orWhere('telefono', 'like', "%{$search}%")
                    ->orWhere('direccion', 'like', "%{$search}%");
            });
        }

        $pacientes = $query->get();

        // Calcular las estadísticas
        $totalPacientes = $pacientes->count();

        // Calculamos la edad promedio (asumiendo que tienes un campo 'fecha_nacimiento')
        $edadPromedio = 0;
        if ($totalPacientes > 0 && $pacientes->first()->fecha_nacimiento) {
            $sumaEdades = 0;
            foreach ($pacientes as $paciente) {
                // Si tienes un campo fecha_nacimiento
                if ($paciente->fecha_nacimiento) {
                    $fechaNacimiento = \Carbon\Carbon::parse($paciente->fecha_nacimiento);
                    $sumaEdades += $fechaNacimiento->age;
                }
            }
            $edadPromedio = round($sumaEdades / $totalPacientes);
        }

        // Calculamos distribución por sexo
        $masculino = 0;
        $femenino = 0;

        if ($totalPacientes > 0) {
            foreach ($pacientes as $paciente) {
                // Normalizar el valor del campo sexo para hacer la comparación más robusta
                $sexoNormalizado = strtoupper(trim($paciente->sexo ?? ''));

                if ($sexoNormalizado == 'M' || $sexoNormalizado == 'MASCULINO' ||
                    $sexoNormalizado == 'HOMBRE' || $sexoNormalizado == 'H') {
                    $masculino++;
                }
                elseif ($sexoNormalizado == 'F' || $sexoNormalizado == 'FEMENINO' ||
                    $sexoNormalizado == 'MUJER' || $sexoNormalizado == 'M') {
                    $femenino++;
                }
            }
        }

        // Calculamos los porcentajes
        if ($totalPacientes > 0) {
            $porcentajeMasculino = round(($masculino / $totalPacientes) * 100);
            $porcentajeFemenino = round(($femenino / $totalPacientes) * 100);
            $distribucionGenero = "{$porcentajeMasculino}% H / {$porcentajeFemenino}% M";
        } else {
            $distribucionGenero = 'Sin datos';
        }

        // Calculamos los porcentajes
        if ($totalPacientes > 0) {
            $porcentajeMasculino = round(($masculino / $totalPacientes) * 100);
            $porcentajeFemenino = round(($femenino / $totalPacientes) * 100);
            $distribucionGenero = $porcentajeMasculino . '% M / ' . $porcentajeFemenino . '% F';
        } else {
            $distribucionGenero = 'Sin datos';
        }

        // Último registro (fecha del paciente más reciente)
        $ultimoRegistro = $pacientes->count() > 0 ? $pacientes->sortByDesc('created_at')->first()->created_at->format('d-m-Y') : date('d-m-Y');

        $configuracion = Configuracione::latest()->first();

        // Pasar los datos estadísticos a la vista
        $pdf = PDF::loadView('admin.pacientes.pdf', compact('pacientes', 'configuracion', 'totalPacientes', 'edadPromedio', 'distribucionGenero', 'ultimoRegistro'
        ));

        return $pdf->stream('pacientes_' . date('Y-m-d') . '.pdf');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
    }

    public function store(Request $request)
    {
        // Concatenar la nacionalidad con la cédula
        $cedulaCompleta = $request->input('nacionalidad') . '-' . $request->input('cedula');

        // Validación de los datos ingresados
        $request->validate([
            'nombres' => 'nullable|string|max:255',
            'apellidos' => 'nullable|string|max:255',
            'nacionalidad' => 'required|in:V,E',
            'cedula' => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:Masculino,Femenino',
            'edad' => 'nullable|integer|min:0|max:150',
            'ocupacion' => 'nullable|string|max:255',
            'estado_civil' => 'nullable|in:Soltero(a),Casado(a),Divorciado(a),Viudo(a)',
            'ocupacion_actual' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:15',
            'direccion' => 'required|string|max:500',
            'email' => 'required|email|max:250|unique:pacientes,correo',
        ]);

        try {
            // Verificar si la cédula concatenada ya existe en la base de datos
            if (Paciente::where('cedula', $cedulaCompleta)->exists()) {
                return redirect()->route('admin.pacientes.index')
                    ->with('mensaje', 'La cédula ingresada ya está registrada. Por favor, ingrese una cédula diferente.')
                    ->with('icono', 'error'); // Cambiar el ícono a "error"
            }

            // Crear el paciente
            $paciente = new Paciente();

            $paciente->nombres = $request->input('nombres');
            $paciente->apellidos = $request->input('apellidos');
            $paciente->cedula = $cedulaCompleta;
            $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
            $paciente->sexo = $request->input('sexo');
            $paciente->edad = $request->input('edad');
            $paciente->ocupacion = $request->input('ocupacion');
            $paciente->estado_civil = $request->input('estado_civil');
            $paciente->ocupacion_actual = $request->input('ocupacion_actual');
            $paciente->telefono = $request->input('telefono');
            $paciente->direccion = $request->input('direccion');
            $paciente->correo = $request->input('email');

            $paciente->save(); // Guardar en la base de datos


            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'Se registró al paciente correctamente')
                ->with('icono', 'success');
        }

        catch (QueryException $e) {
            // Manejar errores inesperados (por ejemplo, problemas de conexión)
            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'Ocurrió un error inesperado. Por favor, intente nuevamente.')
                ->with('icono', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Buscar el paciente, si no se encuentra, redirige con un error.
        $paciente = Paciente::findOrFail($id);

        // Validación de datos
        $request->validate([
            'nombres' => 'required',
            'apellidos' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required|date',
            'sexo' => 'required',
            'edad' => 'required|integer',
            'ocupacion' => 'required',
            'ocupacion_actual' => 'required',
            'password' => 'nullable|max:250|confirmed',
        ]);

        // Crear la cédula completa con la nacionalidad
        $nacionalidad = $request->input('nacionalidad'); // V o E
        $cedula = $request->input('cedula'); // El número de cédula

        $cedulaCompleta = $nacionalidad . '-' . $cedula;

        // Asignar los valores al paciente
        $paciente->nombres = $request->input('nombres');
        $paciente->apellidos = $request->input('apellidos');
        $paciente->cedula = $cedulaCompleta; // Actualizar la cédula completa
        $paciente->fecha_nacimiento = $request->input('fecha_nacimiento');
        $paciente->sexo = $request->input('sexo');
        $paciente->edad = $request->input('edad');
        $paciente->ocupacion = $request->input('ocupacion');
        $paciente->estado_civil = $request->input('estado_civil');
        $paciente->ocupacion_actual = $request->input('ocupacion_actual');
        $paciente->telefono = $request->input('telefono');
        $paciente->direccion = $request->input('direccion');

        // Si se proporciona un nuevo password, se actualiza
        if ($request->filled('password')) {
            $paciente->password = bcrypt($request->input('password'));
        }

        // Guardar el paciente actualizado
        $paciente->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Se actualizaron los datos del paciente correctamente')
            ->with('icono', 'success');
    }


    public function confirmDelete($id){
        $paciente = Paciente::findOrFail($id);
        return view ('admin.pacientes.delete', compact('paciente'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
            ->with('mensaje', 'Paciente eliminado correctamente')
            ->with('icono', 'success');
    }
}
