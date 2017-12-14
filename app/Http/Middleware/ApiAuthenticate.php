<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Autorization
         */
        $response = $next($request);
        $response->header('Accept', 'application/json');
        $response->header('Access-Control-Allow-Origin', '*');
        $response->header('Access-Control-Allow-Methods', 'POST, HEAD, PUT, GET, DELETE, OPTIONS');
        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Accept, Id, Authorization, X-Request-With');
        $response->header('Access-Control-Allow-Credentials','true');
        $response->header('Access-Control-Max-Age', '0');
        if ($request->header('authorization') == 'Bearer '.env('TOKEN', 'smartorder_token')) {
            return $response;
        }
        return $response->json(['error' => 'No Authorization'], 403);

    }
}
