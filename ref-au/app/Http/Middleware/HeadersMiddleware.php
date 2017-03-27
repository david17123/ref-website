<?php

namespace App\Http\Middleware;

use Closure;

class HeadersMiddleware
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
        $response = $next($request);

        // Send response headers for CORS access within the *.ref-au.org family
        // Determine if allowed origin
        $passedOriginTest = false;
        $allowedOrigin = route('mainHome');
        $origin = $request->header('Origin', '');
        $test = preg_match('/^(?:https?:\/\/)?(?:[A-Za-z0-9-]+\.)?ref-au\.(?:org|localhost)$/', $origin);
        if ($test === 1)
        {
            $allowedOrigin = $origin;
            $passedOriginTest = true;
        }
        $response->header('Vary', 'Origin')
                 ->header('Access-Control-Allow-Origin', $allowedOrigin);

        if ($passedOriginTest)
        {
            // $response->header('Access-Control-Allow-Credentials', 'true');
        }

        // Send headers for OPTIONS requests
        if ($request->isMethod('options'))
        {
            $allowedHeaders = [
                'Content-Type',
                'Content-Range',
                'Content-Disposition'
            ];

            $allowedMethods = [
                'OPTIONS',
                'HEAD',
                'GET',
                'POST',
                'PUT',
                'PATCH',
                'DELETE'
            ];

            $response->header('Access-Control-Allow-Headers', implode(', ', $allowedHeaders))
                     ->header('Access-Control-Allow-Methods', implode(', ', $allowedMethods));
        }

        return $response;
    }
}
