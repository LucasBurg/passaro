<?php
return [
    'service_manager' => [
        'factories' => [
            'PassaroTableGateway' => 'Passaro\Factory\PassaroTableGatewayFactory',
            'PassaroTable' => 'Passaro\Factory\PassaroTableFactory',
        ]
    ],
    'controllers' => [
        'invokables' => [
            'Passaro\Controller\Passaro' => 'Passaro\Controller\PassaroController',
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
                'type' => 'Literal',
                'options' => [
                    'route' => '/passaros',
                    'defaults' => [
                        'controller' => 'Passaro\Controller\Passaro',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];