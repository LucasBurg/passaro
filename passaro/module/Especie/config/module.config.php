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
            'Especie\Controller\Especie' => 'Especie\Controller\EspecieController',
            'Especie\Controller\Detail' => 'Especie\Controller\DetailController',
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
                                'controller' => 'Especie\Controller\Detail',
                                'action' => 'index'
                            ],
                            'constraints' => [
                                'id' => '[1-9]+',
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];