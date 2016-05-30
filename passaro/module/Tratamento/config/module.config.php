<?php
return [
    'service_manager' => [
        'factories' => [
            'TratamentoTableGateway' => 'Tratamento\Factory\TratamentoTableGatewayFactory',
            'TratamentoTable' => 'Tratamento\Factory\TratamentoTableFactory'
        ]
    ],
    'controllers' => [
        'factories' => [
            'Tratamento\Controller\Tratamento' => 'Tratamento\Factory\TratamentoControllerFactory',
            'Periodo\Controller\Periodo' => 'Periodo\Factory\PeriodoControllerFactory'
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
            ],
            'periodos' => [
                'type' => 'segment',
                'options' => [
                    'route' => '/periodos[/:action[/:id]]',
                    'defaults' => [
                        'controller' => 'Periodo\Controller\Periodo',
                        'action' => 'index'
                    ],
                    'constraints' => [
                        'action' => '(add|edit|delete)',
                        'id' => '[0-9]+'
                    ]
                ]
            ],
        ]
    ]
];