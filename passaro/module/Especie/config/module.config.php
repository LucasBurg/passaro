<?php
return [
    'service_manager' => [
        'factories' => [
            'EspecieTableGateway' => 'Especie\Factory\EspecieTableGatewayFactory',
            'EspecieTable' => 'Especie\Factory\EspecieTableFactory'
        ]
    ],    
    'controllers' => [
        'invokables' => [
            'Especie\Controller\Especie' => 'Especie\Controller\EspecieController'
        ]
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
                        'controller' => 'Especie\Controller\Especie',
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