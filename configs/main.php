<?php

return [
    'bootstrappers' => [
        'App\Bootstrap'
    ],
    'error_reporting' => E_ALL,
    'display_errors' => '1',
    'display_exceptions' => '1',
    'routes' => [
        'index' => [
            'methods' => 'GET',
            'pattern' => '/',
            'handler' => [
                'controller' => 'index'
            ], 
        ],
        'hello' => [
            'methods' => ['GET'],
            'pattern' => '/hello/{name:\w+}',
            'handler' => [
                'controller' => 'index',
                'action' => 'hello'
            ],
        ]        
    ],
    'service_container' => [
        'factories' => [
            'index' => \App\Controller\IndexController::class
        ]
    ],
    'templates_paths' => [
        'index' => TEMPLATES_PATH . '/index'
    ],
    'templates' => [
        'main' => TEMPLATES_PATH . '/main.phtml'
    ],
    'layout' => 'main'
];
