<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:41:20
 *
 */

return [
    '/up[/[{table:\w+}[/]]]' => [
        'get' => [
            'handler' => 'App\Controllers\DBMigrationController:up',
            'name' => 'db_up',
            'auth' => true
        ]
    ],
    '/down[/[{table:\w+}[/]]]' => [
        'get' => [
            'handler' => 'App\Controllers\DBMigrationController:down',
            'name' => 'db_down',
            'auth' => true
        ]
    ],
];