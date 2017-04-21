<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Response;

class EnableCrossRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$origin = "*")
    {
        return $next($request);
//        if ($request->isMethod('OPTIONS')) {
//            echo 22;exit;
//            return response('', 200)
//                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
//                ->header('Access-Control-Allow-Headers', 'accept, content-type,
//                x-xsrf-token, x-csrf-token'); // Add any required headers here
//        }

//        $response = $next($request);
//        $response->header('Access-Control-Allow-Origin', "*");
//        $response->header('Access-Control-Allow-Headers', 'Origin, Content-Type, Cookie, Accept');
//        $response->header('Access-Control-Allow-Methods', 'GET, POST, PATCH, PUT, OPTIONS');
//

        //$response->header('Access-Control-Allow-Credentials', 'false');
        //return $response;
    }
}
