<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:53:48
 *
 */

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
            'template_path' => __DIR__ . '/../../templates/',
        ],
        // Renderer settings
        'view' => [
            'template_path' => __DIR__ . '/../../templates',
            'twig' => [
                'cache' => __DIR__ . '/../../cache/twig',
                'debug' => true,
                'auto_reload' => true
            ]
        ],
        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
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
        // Database reading and writing separation
        // Eloquent read
        'db_read' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'test_read',
            'username' => '',
            'password' => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ],
        // Eloquent write
        'db_write' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'database' => 'test_write',
            'username' => '',
            'password' => '',
            'charset'   => 'utf8',
            'collation' => 'utf8_general_ci',
            'prefix'    => '',
        ],
        // session
        'session' => [
            'name' => 'test_session',
            'autorefresh' => true,
            'httponly' => true,
            'lifetime' => '30 minutes'
        ],
        'upload_folder' => 'upload',
        'upload_img_exts' => ['png', 'jpeg', 'jpg', 'gif', 'bmp'],
        'upload_data_ext' => ['swf'],
        'base_path' => full_path(__DIR__ . '/../../public'),
        // 加密字符串
        'encryString' => 'KHF7A8kfa&',
];