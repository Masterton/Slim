<?php
// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(new \App\Middlewares\DevCrossDomain($app));
$app->add(new \App\Middlewares\DevRbacOperation($app));
// $app->add(new \App\Middlewares\PermissionAuth($app));