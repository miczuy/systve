<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class PerfilController extends Controller
{
    /**
     * Mostrar página de perfil del usuario autenticado
     */
    public function index()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        if (!$paciente) {
            // Si el usuario no tiene un perfil de paciente, redirigir con mensaje
            return redirect()->route('perfil.editar')
                ->with('mensaje', 'Por favor, completa tu información de perfil para continuar.')
                ->with('icono', 'info');
        }

        return view('admin.perfil.index', compact('user', 'paciente'));
    }

    /**
     * Mostrar formulario para editar perfil
     */
    public function editar()
    {
        $user = Auth::user();
        $paciente = Paciente::where('user_id', $user->id)->first();

        return view('admin.perfil.editar', compact('user', 'paciente'));
    }

    /**
     * Actualizar perfil del paciente
     */
    public function actualizar(Request $request)
    {
        $user = Auth::user();

        // Concatenar la nacionalidad con la cédula
        $cedulaCompleta = $request->input('nacionalidad') . '-' . $request->input('cedula');

        // Reglas de validación
        $rules = [
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
            'email' => 'required|email|max:250',
        ];

        $request->validate($rules);

        // Buscar paciente existente o crear uno nuevo
        $paciente = Paciente::where('user_id', $user->id)->first();
        $isNew = false;

        if (!$paciente) {
            $paciente = new Paciente();
            $paciente->user_id = $user->id;
            $isNew = true;
        }

        // Verificar si la cédula ya existe para otro paciente
        $cedulaExistente = Paciente::where('cedula', $cedulaCompleta)
            ->when($paciente->exists, function($query) use ($paciente) {
                return $query->where('id', '!=', $paciente->id);
            })
            ->first();

        if ($cedulaExistente) {
            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'La cédula ' . $cedulaCompleta . ' ya está registrada para otro paciente. Por favor, verifique sus datos.')
                ->with('icono', 'error');
        }

        try {
            // Actualizar datos del paciente
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

            // Actualizar el correo del usuario si cambió
            if ($user->email !== $request->input('email')) {
                $user->email = $request->input('email');
                $user->save();
            }

            $mensaje = $isNew ? 'Tu perfil ha sido creado correctamente' : 'Tu perfil ha sido actualizado correctamente';

            return redirect()->route('perfil.index')
                ->with('mensaje', $mensaje)
                ->with('icono', 'success');
        } catch (\Exception $e) {
            \Log::error('Error al actualizar perfil: ' . $e->getMessage());

            return redirect()->back()
                ->withInput()
                ->with('mensaje', 'Ocurrió un error al actualizar tu información. Por favor, intenta nuevamente.')
                ->with('icono', 'error');
        }
    }

    /**
     * Mostrar formulario para cambiar contraseña
     */
    public function cambiarPassword()
    {
        return view('admin.perfil.cambiar-password');
    }

    /**
     * Actualizar contraseña
     */
    public function actualizarPassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', function ($attribute, $value, $fail) {
                if (!Hash::check($value, Auth::user()->password)) {
                    $fail('La contraseña actual es incorrecta.');
                }
            }],
            'password' => ['required', 'confirmed', Password::min(8)->letters()->numbers()],
        ]);

        $user = Auth::user();
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return redirect()->route('perfil.index')
            ->with('mensaje', 'Tu contraseña ha sido actualizada correctamente')
            ->with('icono', 'success');
    }
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->user()->can('ver.perfil.paciente')) {
                abort(403, 'No tienes permiso para acceder a esta funcionalidad.');
            }
            return $next($request);
        });
    }
}
