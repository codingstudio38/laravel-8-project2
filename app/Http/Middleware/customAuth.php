<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
class customAuth
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
        //echo $path;exit;
        if(($path=="PaginatLogin") && (Session::get('user_email'))){
            return redirect('PaginationDataFatch');
        } 
        else if (($path=="PaginationDataFatch") && (!(Session::get('user_email')))){
            return redirect('Paginatlogout');
        }
        else if (($path=="InsertData") && (!(Session::get('user_email')))){
           return redirect('Paginatlogout');
        }
        else if (($path=="Update") && (!(Session::get('user_email')))){
           return redirect('Paginatlogout');
        } 
        if($path== "xlimport" || $path== "xlexport" || $path== "csvexport"){
            return $next($request);
        } else {
            return $next($request)
            ->header('Cache-Control','no-cache, no-store, max-age=0, must-revalidate')
            ->header('Pragma','no-cache')
            ->header('Expires','Set 01 Jan 1990 00:00:00 GMT');
        }
        
    }
}
