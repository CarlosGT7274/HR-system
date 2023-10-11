<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Closure;

class WithAuth
{
    // Podrías checar la siguiente página para más información acerca de estas cabeceras
    // https://securityheaders.com/

    // Lista las cabeceras que no quieras en tus respuestas de tu aplicación
    // Hay cabeceras que no es recomendable que se muestren, por ejemplo "X-Powered-BY" muestra información del servidor, la puedes editar a tu gusto
    private $unwishedHeaders = [
        'X-Powered-By',
        'Server',
    ];

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $this->deleteUnwishedHeaders($this->unwishedHeaders);

        return session('token') ? $next($request) : redirect()->route('login.form');
    }
    private function deleteUnwishedHeaders($headers)
    {
        foreach ($headers as $header)
            header_remove($header);
    }
}