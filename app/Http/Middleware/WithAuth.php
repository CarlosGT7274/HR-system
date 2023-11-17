<?php

namespace App\Http\Middleware;

use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as InternalRequest;
use Closure;

class WithAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (session('token')) {

            $internalRequest = InternalRequest::createFromBase($request);

            $internalRequest->server->set('REQUEST_URI', '/api/' . env('API_VERSION') . '/validate');

            $internalRequest->headers->set('Authorization', 'Bearer ' . session('token'));

            $response = app()->handle($internalRequest);

            if ($response->getStatusCode() == 401) {
                return redirect()->route('login.form');
            } else {
                return $next($request);
            }
        } else {
            return redirect()->route('login.form');
        }
    }
}
