<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class ValidateUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){
        if(Session::get('User_Details')!=""){
            return $next($request);
        }
        else{
            return response()->view('index',['Invalid'=>'Session Time out. Please login again']);
        }
    }
}
