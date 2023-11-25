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
        $token = $request->header('Authorization');

        if ($token){
            return $next($request);
        }

        // Si no es administrador, devolver respuesta de acceso prohibido
        return response()->json(['message' => 'Acceso no autorizado'], 403);
    }
    private function isValidSanctumToken($token)
    {
        // Intenta autenticar al usuario usando el token de Sanctum
        return auth()->guard('sanctum')->user() !== null;

    }
}
