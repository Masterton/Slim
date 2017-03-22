<?php
return [
    'settings' => [
        'determineRouteBeforeAppMiddleware' => true, # https://github.com/slimphp/Slim/issues/1505
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // debug
        'debug' => true,
        'mode' => 'development',

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Renderer settings
        'view' => [
            'template_path' => __DIR__ . '/../templates',
            'twig' => [
                'cache' => __DIR__ . '/../cache/twig',
                'debug' => true,
                'auto_reload' => true
            ]
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Environment
        'php' => [
            'error_reporting' => E_ALL,
            'display_errors' => true,
            'log_errors' => true,
            'error_log' => true,
            'timezone' => 'Asia/Shanghai'
        ],

        // Eloquent
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'test',
            'username' => 'root',
            'password' => 'root',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ],

        // secret key
        'secret' => 'secret string for cp-flow',

        
        'upload_folder' => 'upload',
        'upload_img_exts' => ['png', 'jpeg', 'jpg', 'gif', 'bmp'],
        'base_path' => full_path(__DIR__ . '/../public')
    ],
];
