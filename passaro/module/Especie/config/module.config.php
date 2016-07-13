<?php
namespace Especie;

use Zend\Mvc\Controller\LazyControllerAbstractFactory;

return [
    'service_manager' => [
        'factories' => [
            Model\EspecieTable::class => Factory\EspecieTableFactory::class
        ]
    ],    
    'controllers' => [
        'factories' => [
            Controller\EspecieController::class => LazyControllerAbstractFactory::class
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            'especie' => __DIR__ . '/../view',
        ]
    ],
    'router' => [
        'routes' => [
            'especies' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/especies',
                    'defaults' => [
                        'controller' => Controller\EspecieController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'detail' => [
                        'type' => 'Segment',
                        'options' => [
                            'route' => '/:id',
                            'defaults' => [
                                'action' => 'detail'
                            ],
                            'constraints' => [
                                'id' => '[0-9]+',
                            ]
                        ]
                    ],
                    'new' => [
                        'type' => 'Literal',
                        'options' => [
                            'route' => '/novo',
                            'defaults' => [
                                'action' => 'new'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];