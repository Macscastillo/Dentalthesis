<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    public function handle($request, Closure $next)
    {
        return $next($request)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, X-Token-Auth, Accept, Authorization');
    // }

    //     header("Access-Control-Allow-Origin: *");
    //     $headers = [
    //         'Access-Control-Methods' => 'POST, GET , OPTION, PUT, DELETE',
    //         'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin, Authorization',
    //     ];

    //     if($reqest->getMethod() == "OPTIONS"){
    //         return response()->json('OK', 200, $headers);
    //     }
    //     $response = $next($request);
    //     foreach($headeres as $key => $value){
    //         $response->header($key, $value);
    //     }
    //     return $response;
    }
}

?>