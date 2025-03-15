<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    public function create()
    {
        return view('auth.login'); // Asegúrate de que esta vista exista
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Intenta autenticar al usuario
        if (Auth::attempt($request->only('email', 'password'))) {
            // Verifica si el usuario está activo
            if (!auth()->user()->status) {
                Auth::logout(); // Cierra la sesión del usuario
                throw ValidationException::withMessages([
                    'email' => 'Tu cuenta está desactivada. Contacta al administrador.',
                ]);
            }

            $request->session()->regenerate();
            return redirect()->intended('/admin'); // Redirige a la página deseada
        }

        throw ValidationException::withMessages([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
