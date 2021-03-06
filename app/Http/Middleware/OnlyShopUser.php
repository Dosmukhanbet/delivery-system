<?php

namespace App\Http\Middleware;

use Closure;

class OnlyShopUser
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
        if( $user->type == 'shop') 
        {
             return $next($request);
        }

         return redirect('/');
    }
}
