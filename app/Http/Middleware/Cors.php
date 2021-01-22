<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle(Request $request, Closure $next)
    {
        return $next($request)
            ->header('Access-Control-Allow-Origin', "*")
            ->header('Access-Control-Allow-Methods', "PUT,POST,DELETE,GET,OPTION")
            ->header('Access-Control-Allow-Headers', "X-Requested-With,Content-Type,X-Token-Auth,Authorization,Accept");
    }
}

?>