<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SetCharset
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
        $contentType = $response->headers->get('Content-Type');
        //dd($contentType);
        //if (strpos($contentType, 'text/html') !== false) {
            $response->header('Content-Type', 'text/html; charset=WIN1252');
        //}
      

        return $response;
    }
}
