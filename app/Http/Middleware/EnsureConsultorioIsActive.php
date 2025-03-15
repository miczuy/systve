<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureConsultorioIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el consultorio está activo
        if (!$request->consultorio || !$request->consultorio->is_active) {
            return response()->json([
                'message' => 'El consultorio no está activo. No se puede asignar.'
            ], 403);
        }

        return $next($request);
    }
}
