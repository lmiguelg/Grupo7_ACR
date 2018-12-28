<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class CheckLoja
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

        if (Auth::user() && Auth::user()->category() == 'loja'/*$category*/) {
            return $next($request);
        }
        return response("Permissões insuficientes", 401);
    }
}
