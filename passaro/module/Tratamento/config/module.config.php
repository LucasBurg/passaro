<?php
return [
    'service_manager' => [
        'factories' => [
            'TratamentoTableGateway' => 'Tratamento\Factory\TratamentoTableGatewayFactory',
            'TratamentoTable' => 'Tratamento\Factory\TratamentoTableFactory'
        ]
    ],
    'controllers' => [
        'invokables' => [
            //'Tratamento\Controller\Tratamento' => 'Tratamento\Controller\TratamentoController',
        ],
        'factories' => [
            'Tratamento\Controller\Tratamento' => 'Tratamento\Factory\TratamentoControllerFactory',
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