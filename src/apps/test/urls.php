<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:43:26
 *
 */

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
];