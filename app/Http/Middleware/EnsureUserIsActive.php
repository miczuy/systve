<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsActive
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario está autenticado y si su estado es activo
        if (auth()->check() && !auth()->user()->status) {
            auth()->logout(); // Cierra la sesión del usuario
            return redirect('/login')->withErrors([
                'email' => 'Tu cuenta está desactivada. Contacta al administrador.',
            ]);
        }

        return $next($request);
    }
}
