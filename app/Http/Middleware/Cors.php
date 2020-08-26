<?php

namespace App\Http\Middleware;

use Closure;
use http\Client\Response;

class Cors
{
    public function handle($request, Closure $next)
    {
        header("Access-Control-Allow-Origin: *");

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => '*',
            'Access-Control-Allow-Methods' => '*',
            'Access-Control-Allow-Headers' => '*'
        ];
        if ($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);
        foreach ($headers as $key => $value)
            $response->header($key, $value);
        return $response;
    }
}
