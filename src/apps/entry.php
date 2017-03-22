<?php

return [
    'api' => [
        'prefix' => '/api',
        'urls' => require __DIR__ . '/api/urls.php'
    ],
    'test' => [
        'prefix' => '/test',
        'urls' => require __DIR__ . '/test/urls.php'
    ],
    'visit' => [
        'prefix' => '/visit',
        'urls' => require __DIR__ . '/visit/urls.php'
    ],
    'db' => [
        'prefix' => '/db',
        'urls' => [
            '/up[/[{table:\w+}[/]]]' => [
                'get' => [
                    'handler' => '\App\Tests\Dev\DBMigration:up',
                    'name' => 'db_up',
                    'auth' => true
                ]
            ],
            '/down[/[{table:\w+}[/]]]' => [
                'get' => [
                    'handler' => '\App\Tests\Dev\DBMigration:down',
                    'name' => 'db_down',
                    'auth' => true
                ]
            ],
        ]
    ],
];
