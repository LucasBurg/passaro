<?php
namespace Teste1;

use Zend\ServiceManager\Factory\InvokableFactory;

return [
    'controllers' => [
        'factories' => [
            Controller\IndexController::class => InvokableFactory::class
        ]
    ],
    'router' => [
        'routes' => [
            'teste1' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/teste1',
                    'defaults' => [
                        'controller' => Controller\IndexController::class,
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];

