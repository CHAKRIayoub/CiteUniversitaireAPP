<?php

namespace App\Http\Middleware;

use Closure;
use App\Application;

class AppDates
{
    
    public function handle($request, Closure $next)
    {
        $app = Application::where('id', 1)->first();
        $dated = strtotime($app->date_d);
        $datef = strtotime($app->date_f);
        $datec = strtotime(date('y-m-d'));
        
        if ( ($datec >= $dated) && ($datef >= $datec )){

            return $next($request);

        }else{

            return redirect('/error');

        }  
        
    }
}
