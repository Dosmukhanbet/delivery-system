<?php

namespace App\Http\Middleware;

use Closure;

class OnlyAdmin
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
         $user = auth()->user();
        if( $user->type == 'admin') 
        {
             return $next($request);
        }

         return redirect('/');
    }
}