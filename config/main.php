<?php

return [
    'bootstrappers' => [
        'App\Bootstrap'
    ],
    'error_reporting' => DEBUG ? (-1) : (E_ERROR | E_WARNING | E_PARSE),
    'display_errors' => DEBUG ? 1 : 0,
    'display_exceptions' => DEBUG ? true : false,
    'router_cache_enabled' => false,
    'router_cache_file' => 'data/cache/routes.php.cache',
    'routes' => [
        'index' => [
            'methods' => 'GET',
            'pattern' => '/',
            'handler' => [
                'controller' => '\App\Controller\IndexController'
            ], 
        ],
        'hello' => [
            'methods' => ['GET', 'POST'],
            'pattern' => '/hello/{name:\w+}',
            'handler' => [
                'controller' => '\App\Controller\IndexController',
                'action'     => 'hello'
            ],
        ],
        'time' => [
            'methods' => 'GET',
            'pattern' => '/time',
            'handler' => [
                'controller' => '\App\Controller\TimeController'
            ], 
        ],
    ],
    'service_container' => [
        'factories' => [
            '\App\Controller\IndexController' => \App\Controller\IndexController::class,
            '\App\Controller\TimeController' => \App\Controller\TimeController::class,
            'exception_handler' => \App\Handler\ExceptionHandler::class,
            'not_found_handler' => \App\Handler\NotFoundHandler::class
        ],
    ],
    'templates_paths' => [
        '\App\Controller\IndexController' => TEMPLATES_PATH . '/index',
    ],
    'templates' => [
        'main' => TEMPLATES_PATH . '/layout/main.phtml',
        'template_error' => TEMPLATES_PATH . '/error/error.phtml',
        'template_404' => TEMPLATES_PATH . '/error/404.phtml',
    ],
    'layout' => 'main'
];
