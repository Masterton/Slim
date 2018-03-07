<?php

namespace App\Middlewares;

/**
 * 开发阶段-跨域支持
 */
class DevCrossDomain extends Base {

    public function __invoke(\Slim\Http\Request $request, \Slim\Http\Response $response, callable  $next) {
        $response = $next($request, $response);
        $response = $response->withHeader('Access-Control-Allow-Origin', '*');
        $response = $response->withHeader('Access-Control-Allow-Headers', 'Content-Type,X-Requested-With,X_Requested_With');
        $response = $response->withHeader('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE,HEAD,PATCH,OPTIONS');
       return $response;
    }
}