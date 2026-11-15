<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
  if ($request->get('rol') !== 'admin') {
            // ...lo echamos. Usamos un abort() para un error 403 (Prohibido).
            // Es lo mismo que tu `header Location` antiguo, pero estilo Laravel.
            abort(403, 'Acceso denegado: No eres administrador.');
        }

        // Si sí es admin, le decimos: "Déjalo pasar al controlador"
        return $next($request);
    }
}
