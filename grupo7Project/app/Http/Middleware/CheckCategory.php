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
    public function handle($request, Closure $next)
    {


        if (Auth::user() && Auth::user()->category() == 'admin'/*$category*/) {
            return $next($request);
        }
        return response("Permissões insuficientes", 401);
    }
}
