<?php
return [
    'controllers' => [
        'invokables' => [
            'Especie\Controller\Especie' => 'Especie\Controller\EspecieController',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'especie' => __DIR__ . '/../view',
        ]
    ],
    'router' => [
        'routes' => [
            'especie' => [
                'type' => 'Literal',
                'options' => [
                    'route' => '/especies',
                    'defaults' => [
                        'controller' => 'Especie\Controller\Especie',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];