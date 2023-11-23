<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
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
        // Verificar si el usuario está autenticado y es un administrador
        if (Auth::check() && Auth::user()->isAdmin) {
            // Continuar con la solicitud si es administrador
            return $next($request);
        }

        // Si no es administrador, devolver respuesta de acceso prohibido
        return response()->json(['message' => 'Acceso no autorizado'], 403);
    }
}