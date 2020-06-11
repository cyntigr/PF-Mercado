<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    /**
     * Handle an incoming request.
     * Check if user is the correct for access
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $type)
    {
        $user = Auth::user();

        if ($user->checkType($type)){
            return $next($request) ;
        }
        return redirect()->route('home');
    }
}
