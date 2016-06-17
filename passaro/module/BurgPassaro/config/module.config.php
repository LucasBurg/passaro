<?php
return [
    'service_manager' => [
        'factories' => [
            'TratamentoIndicacaoTableGateway' => 'TratamentoIndicacao\Factory\TratamentoIndicacaoTableGatewayFactory',
            'TratamentoIndicacaoTable' => 'TratamentoIndicacao\Factory\TratamentoIndicacaoTableFactory'
        ]
    ],    
    'controllers' => [
        'invokables' => [
            'TratamentoIndicacaoIndex' => 'TratamentoIndicacao\Controller\IndexController',
            'TratamentoIndicacaoWrite' => 'TratamentoIndicacao\Controller\WriteController'
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'tratamento_indicacao' => __DIR__ . '/../view',
        ]
    ],
    'router' => [
        'routes' => [
            'tratamento_indicacao' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tratamento_indicacao',
                    'defaults' => [
                        'controller' => 'TratamentoIndicacaoIndex',
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'edit' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/edit/:id',
                            'defaults' => [
                                'controller' => 'TratamentoIndicacaoWrite',
                                'action' => 'edit'
                            ],
                            'constraints' => [
                                'id' => '[0-9]+'
                            ]
                        ]
                    ],
                    'add' => [
                        'type' => 'literal',
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => 'TratamentoIndicacaoWrite',
                                'action' => 'add'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];