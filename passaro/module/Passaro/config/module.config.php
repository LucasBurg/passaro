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
                'type' => 'Segment',
                'options' => [
                    'route' => '/passaros[/:action[/:id]]',
                    'defaults' => [
                        'controller' => 'Passaro\Controller\Passaro',
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