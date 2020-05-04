<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()):

            // si es administrador lo redirigimos a su sección
            if (Auth::user()->esAdministrador()) return redirect()->route('admin') ;

            // si es un usuario normal, lo redirigimos a los tableros
            return redirect()->route('home') ;
        endif ;

        return $next($request);
    }
}
