<?php

namespace App\Http\Controllers;
use App\Models\Configuracione;
use Illuminate\Support\Facades\Validator;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use App\Models\User;



class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        // Usamos una subconsulta para obtener pacientes con usuarios activos
        $query = Paciente::whereHas('user', function ($query) {
            $query->where('status', true);
        });

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

        $pacientes = $query->paginate(10);

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
        $usuario = auth()->user();

        // Si el usuario está autenticado y es paciente, buscamos su perfil
        if ($usuario) {
            $paciente = Paciente::where('user_id', $usuario->id)->first();

            if ($paciente) {
                // Si ya existe el perfil del paciente, mostramos el formulario con datos
                return view('admin.pacientes.create', compact('paciente'));
            }
        }

        // Si no hay usuario o no tiene perfil, mostramos el formulario vacío
        return view('admin.pacientes.create');
    }

    public function store(Request $request)
    {
        // Concatenar la nacionalidad con la cédula
        $cedulaCompleta = $request->input('nacionalidad') . '-' . $request->input('cedula');

        // Validación de los datos ingresados
        $validator = Validator::make($request->all(), [
            'nombres' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'nacionalidad' => 'required|in:V,E',
            'cedula' => 'required|string|max:100',
            'fecha_nacimiento' => 'nullable|date',
            'sexo' => 'nullable|in:Masculino,Femenino',
            'edad' => 'nullable|integer|min:0|max:150',
            'ocupacion' => 'nullable|string|max:255',
            'estado_civil' => 'nullable|in:Soltero(a),Casado(a),Divorciado(a),Viudo(a)',
            'ocupacion_actual' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:15',
            'direccion' => 'required|string|max:500',
            'email' => 'required|email|max:250|unique:users,email',
        ]);

        // Si se está creando un usuario, validar la contraseña
        if ($request->has('create_user') && $request->input('create_user')) {
            $validator->addRules([
                'password' => 'required|min:6|confirmed',
            ]);
        }

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Verificar explícitamente si la cédula ya existe en otro paciente
        $cedulaExistente = Paciente::where('cedula', $cedulaCompleta)->first();
        if ($cedulaExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'La cédula ' . $cedulaCompleta . ' ya está registrada para otro paciente. Por favor, verifique sus datos.')
                ->with('icono', 'error');
        }

        // Iniciar transacción de base de datos
        \DB::beginTransaction();

        try {
            // Verificar si el usuario ya tiene un perfil de paciente
            $usuario = auth()->user();
            $pacienteExistente = null;
            $newUser = null;

            if ($usuario && !$request->has('create_user')) {
                $pacienteExistente = Paciente::where('user_id', $usuario->id)->first();
            }

            if ($pacienteExistente) {
                // Actualizar perfil existente
                $pacienteExistente->nombres = $request->input('nombres');
                $pacienteExistente->apellidos = $request->input('apellidos');
                $pacienteExistente->cedula = $cedulaCompleta;
                $pacienteExistente->fecha_nacimiento = $request->input('fecha_nacimiento');
                $pacienteExistente->sexo = $request->input('sexo');
                $pacienteExistente->edad = $request->input('edad');
                $pacienteExistente->ocupacion = $request->input('ocupacion');
                $pacienteExistente->estado_civil = $request->input('estado_civil');
                $pacienteExistente->ocupacion_actual = $request->input('ocupacion_actual');
                $pacienteExistente->telefono = $request->input('telefono');
                $pacienteExistente->direccion = $request->input('direccion');
                $pacienteExistente->correo = $request->input('email');

                $pacienteExistente->save();

                $mensaje = 'Se actualizó su perfil correctamente';
                $pacienteSaved = $pacienteExistente;
            } else {
                // Si es una creación desde el panel admin, crear usuario primero
                if ($request->has('create_user') && $request->input('create_user')) {
                    // Crear nuevo usuario
                    $newUser = new User();
                    $newUser->name = $request->input('nombres') . ' ' . $request->input('apellidos');
                    $newUser->email = $request->input('email');
                    $newUser->password = Hash::make($request->input('password'));
                    $newUser->save();

                    // Asignar rol de paciente de manera más segura
                    $rolPaciente = \Spatie\Permission\Models\Role::where('name', 'usuario')->first();

                    if ($rolPaciente) {
                        // Asignar el rol directamente
                        $newUser->roles()->attach($rolPaciente->id);

                        // Verificar asignación de rol
                        \Log::info('Rol asignado al usuario: ' . $newUser->id . ' - Rol: paciente');
                    } else {
                        \Log::error('No se encontró el rol "paciente" en la base de datos');
                        throw new \Exception('No se pudo asignar el rol de paciente. Por favor, contacte al administrador.');
                    }
                }

                // Crear un nuevo paciente
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

                // Si es un usuario autenticado, vinculamos el paciente
                if ($usuario && !$request->has('create_user')) {
                    $paciente->user_id = $usuario->id;
                } elseif ($newUser) {
                    $paciente->user_id = $newUser->id;
                }

                $paciente->save();
                $pacienteSaved = $paciente;

                $mensaje = 'Se registró al paciente correctamente';

                // Información adicional si se creó un usuario
                if ($newUser) {
                    $mensaje .= ' y se creó una cuenta de acceso con el correo como nombre de usuario';

                    // Verificación adicional del rol
                    if (!$newUser->hasRole('paciente')) {
                        \Log::warning('Usuario creado sin rol de paciente. Intentando reasignar...');
                        $newUser->assignRole('paciente');
                    }
                }
            }

            // Confirmar transacción
            \DB::commit();

            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', $mensaje)
                ->with('icono', 'success');
        }
        catch (\Exception $e) {
            // Revertir transacción en caso de error
            \DB::rollBack();

            \Log::error('Error al guardar paciente: ' . $e->getMessage());

            // Si el error es de cédula duplicada
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == 23000 && strpos($e->getMessage(), 'pacientes_cedula_unique') !== false) {
                return redirect()->back()
                    ->withInput()
                    ->with('mensaje', 'La cédula ' . $cedulaCompleta . ' ya está registrada en el sistema. Por favor, verifique sus datos.')
                    ->with('icono', 'error');
            }

            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ocurrió un error al guardar la información: ' . $e->getMessage())
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
        // Concatenar la nacionalidad con la cédula
        $cedulaCompleta = $request->input('nacionalidad') . '-' . $request->input('cedula');

        // Validación básica para los datos del paciente
        $rules = [
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
            'email' => 'required|email|max:250',
        ];

        // Validaciones adicionales para cambio de contraseña si está marcada la casilla
        if ($request->has('change_password') && $request->input('change_password')) {
            $rules['current_password'] = ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('La contraseña actual es incorrecta.');
                }
            }];
            $rules['password'] = ['required', 'confirmed', Password::min(8)->letters()->numbers()];
        }

        $request->validate($rules);

        // Buscar el paciente a actualizar
        $paciente = Paciente::findOrFail($id);

        // Verificar si la cédula ya existe para otro paciente (distinto al actual)
        $cedulaExistente = Paciente::where('cedula', $cedulaCompleta)
            ->where('id', '!=', $id)
            ->first();
        if ($cedulaExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'La cédula ' . $cedulaCompleta . ' ya está registrada para otro paciente. Por favor, verifique sus datos.')
                ->with('icono', 'error');
        }

        try {
            // Actualizar los campos del paciente
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

            $paciente->save();

            // Actualizar contraseña si se solicitó
            if ($request->has('change_password') && $request->input('change_password')) {
                // Obtener el usuario asociado al paciente
                $user = User::find($paciente->user_id);

                if ($user && $user->id === auth()->id()) {
                    $user->password = Hash::make($request->input('password'));
                    $user->save();

                    $mensajePassword = ' y se ha actualizado su contraseña';
                } else {
                    return redirect()->back()
                        ->withInput()
                        ->with('mensaje', 'No tiene permiso para cambiar la contraseña de este usuario.')
                        ->with('icono', 'error');
                }
            } else {
                $mensajePassword = '';
            }

            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'Se actualizó la información del paciente correctamente' . $mensajePassword)
                ->with('icono', 'success');
        }
        catch (\Exception $e) {
            \Log::error('Error al actualizar paciente: ' . $e->getMessage());

            // Si el error es de cédula duplicada
            if ($e instanceof \Illuminate\Database\QueryException && $e->getCode() == 23000 && strpos($e->getMessage(), 'pacientes_cedula_unique') !== false) {
                return redirect()->back()
                    ->withInput()
                    ->with('mensaje', 'La cédula ' . $cedulaCompleta . ' ya está registrada en el sistema. Por favor, verifique sus datos.')
                    ->with('icono', 'error');
            }

            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ocurrió un error al actualizar la información. Verifique que los datos sean correctos.')
                ->with('icono', 'error');
        }
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
        try {
            \DB::beginTransaction();

            $paciente = Paciente::findOrFail($id);

            // Si el paciente tiene un usuario asociado
            if ($paciente->user_id) {
                $usuario = User::find($paciente->user_id);
                if ($usuario) {
                    // Desactivar usuario asociado
                    $usuario->status = false;
                    $usuario->save();
                }
            }

            \DB::commit();

            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'Paciente desactivado correctamente')
                ->with('icono', 'success');
        } catch (\Exception $e) {
            \DB::rollBack();

            \Log::error('Error al desactivar paciente: ' . $e->getMessage());

            return redirect()->route('admin.pacientes.index')
                ->with('mensaje', 'Error al desactivar el paciente: ' . $e->getMessage())
                ->with('icono', 'error');
        }
    }
}
