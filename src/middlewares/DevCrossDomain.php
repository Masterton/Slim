<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:36:09
 *
 */

namespace App\Middlewares;

use \Slim\Http\Request;
use \Slim\Http\Response;

/**
 * 开发阶段-跨域支持
 *
 */
class DevCrossDomain extends Base
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        $response = $next($request, $response);
        $response = $response->withHeader('Access-Control-Allow-Origin', '*');
        $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type,X-Requested-With,X_Requested_With');
        $response = $response->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,HEAD,PATCH,OPTIONS');
       return $response;
    }
}