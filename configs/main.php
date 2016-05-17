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
        ]        
    ],
    'templates_paths' => [
        'index' => TEMPLATES_PATH . DS . 'index'
    ],    
];