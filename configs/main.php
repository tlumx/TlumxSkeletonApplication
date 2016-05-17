<?php

return [
    'controllers' => [
        'index' => 'Application\Controller\IndexController'
    ],
    'routes' => [
        'index' => [
            'methods' => ['GET'],
            'route' => '/',
            'handler' => [
                'controller' => 'index',
                'action' => 'index'
            ], 
        ],
        'hello' => [
            'methods' => ['GET'],
            'route' => '/hello/{name}',
            'handler' => [
                'controller' => 'index',
                'action' => 'hello'
            ],
            'filters' => ['name' => '(\w+)']
        ]        
    ],
    'templates_paths' => [
        'index' => TEMPLATES_PATH . DS . 'index'
    ],
    'templates' => [
        'main' => TEMPLATES_PATH . DS . 'main.phtml'
    ],
    'layout' => 'main'
];