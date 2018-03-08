<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:42:49
 *
 */

return [
    'api' => [
        'prefix' => '/api',
        'urls' => require __DIR__ . '/api/urls.php'
    ],
    'test' => [
        'prefix' => '/test',
        'urls' => require __DIR__ . '/test/urls.php'
    ],
    'home' => [
        'prefix' => '/',
        'urls' => require __DIR__ . '/home/urls.php'
    ],
    'db' => [
        'prefix' => '/db',
        'urls' => require __DIR__ . '/db/urls.php'
    ],
];
