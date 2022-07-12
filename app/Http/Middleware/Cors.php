<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
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
        $path = $request->path();
        if($path== "xlimport" || $path== "xlexport" || $path== "csvexport"){
            return $next($request);
        } else {
            return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "DELETE, PUT, PATCH, GET, POST, OPTIONS")
            ->header('Access-Control-Allow-Headers', "Accept, Content-Type, X-Auth-Token, Origin, Authorization, X-Requested-With");
        }
    }
}
