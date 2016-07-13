<?php
namespace Passaro;

use Zend\Mvc\Controller\LazyControllerAbstractFactory;

return [
    'service_manager' => [
        'factories' => [
            Model\PassaroTable::class => Factory\PassaroTableFactory::class
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\PassaroController::class => LazyControllerAbstractFactory::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'passaro' => __DIR__ . '/../view',
        ]
    ],
    'router' => [
        'routes' => [
            'passaros' => [
                'type' => 'Segment',
                'options' => [
                    'route' => '/passaros[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\PassaroController::class,
                        'action' => 'index'
                    ],
                    'constraints' => [
                        'action' => '(add|edit|delete)',
                        'id' => '[0-9]+'
                    ]
                ]
            ]
        ]
    ]
];