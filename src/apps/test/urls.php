<?php

return [
    '/ping[/]' => [
        'map' => [
            'handler' => function(\Slim\Http\Request  $request, \Slim\Http\Response  $response, $args=[]) {
                $response->getBody()->write("pong");
                return $response;
            },
            'name' => 'test_ping',
            'methods' => ['GET', 'POST'],
            'auth' => false
        ],
    ],
    '/node[/]' => [
        'get' => [
            'handler' => 'App\Tests\Debug\NodeTest:query',
            'name' => 'test_get_node',
            'auth' => true
        ],
        'post' => [
            'handler' => 'App\Tests\Debug\NodeTest:add',
            'name' => 'test_add_node',
            'auth' => true
        ],
    ],
];