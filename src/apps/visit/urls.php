<?php

return [
    '/user[/]' => [
        'get' => [
            'handler' => 'App\Controllers\UserController:query',
            'name' => 'api_get_user',
            'auth' => true
        ],
    ],
];