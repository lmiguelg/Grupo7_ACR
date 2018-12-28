<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    //
    //category -> contém a categoria do utilizador
    public function handle($request, Closure $next, ...$params)
    {
        //dd($params);
        foreach($params as $user){
            if (Auth::user() && Auth::user()->category() == $user) {
                return $next($request);
            }
        }
        return response("Acesso negado", 401);
    }
}
