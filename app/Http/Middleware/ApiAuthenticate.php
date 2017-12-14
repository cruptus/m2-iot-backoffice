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
        $headers = [
            'Access-Control-Allow-Origin' =>  '*',
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Id, Accept, X-Request-With, Authorization'
        ];
        $response = $next($request);
        foreach ($headers as $key => $value)
            $response->header($key, $value);

        if ($request->getMethod() == "OPTIONS") {
            return response()->json(['OK' => 'OK'], 200, $headers);
        }
        if ($request->header('authorization') == 'Bearer '.env('TOKEN', 'smartorder_token')) {
            return $response;
        }



        return response()->json(['error' => 'Authorization false'], 403, $headers);
    }
}
