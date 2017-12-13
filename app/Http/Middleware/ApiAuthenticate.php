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
        if ($request->header('authorization') == 'Bearer '.env('TOKEN', 'smartorder_token')) {
            $response = $next($request);
            $response->header('Access-Control-Allow-Origin', '*');
            $response->header('Access-Control-Allow-Methods', 'POST, GET');
            return $response;
        }
        else
            return response()->json(['error' => 'No Authorization'], 403);
    }
}
