<?php
return [
    'controllers' => [
        'invokables' => [
            'Tratamento\Controller\Tratamento' => 'Tratamento\Controller\TratamentoController',
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'tratamento' => __DIR__ . '/../view',
        ]
    ],
    'router' => [
        'routes' => [
            'tratamentos' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/tratamentos[/:action[/:id]]',
                    'defaults' => [
                        'controller' => 'Tratamento\Controller\Tratamento',
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