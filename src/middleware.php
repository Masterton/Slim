<?php

/**
 * @author Masterton
 * @version 1.0.0
 * @time 2018-3-8 09:34:28
 *
 */

// Application middleware

// e.g: $app->add(new \Slim\Csrf\Guard);

$app->add(new \App\Middlewares\Test($app));