<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class ChekRole
{
    
    
    public function handle($request, Closure $next, $role, $role2 = null)
    {
            
            if ( $request->user()->getRole() == $role)  return $next($request);

            if ($request->user()->getRole() == $role2) return $next($request);

            return redirect('/');
        
            
    }
}
