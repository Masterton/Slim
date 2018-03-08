<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:44:13
 *
 */

return [
    '/ping[/]' => [
        'map' => [
            'handler' => function(\Slim\Http\Request  $request, \Slim\Http\Response  $response, $args=[]) {
                $response->getBody()->write("pong");
                return $response;
            },
            'name' => 'api_ping',
            'methods' => ['GET', 'POST'],
            'auth' => false
        ],
    ],
    '/test[/]' => [
        'get' => [
            'handler' => 'App\Controllers\TestController:add',
            'name'    => 'api_get_node',
            'auth'    => true,
            'op_class' => 'test',
            'op_name' => 'test',
        ],
    ],
];