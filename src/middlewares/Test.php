<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:28:26
 *
 */

namespace App\Middlewares;

use \Slim\Http\Request;
use \Slim\Http\Response;

/**
 * 测试中间件
 *
 */
class Test extends Base
{
    public function __invoke(Request $request, Response $response, callable $next)
    {
        // TODO 执行的实际功能代码

        $response = $next($request, $response);
        return $response;
    }
}