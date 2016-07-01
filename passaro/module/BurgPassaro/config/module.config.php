<?php
return [
    'service_manager' => [
        'factories' => [
            'TratamentoIndicacaoTableGateway' => 'TratamentoIndicacao\Factory\TratamentoIndicacaoTableGatewayFactory',
            'TratamentoIndicacaoTable' => 'TratamentoIndicacao\Factory\TratamentoIndicacaoTableFactory',
            'TratamentoPrescricaoTableGateway' => 'TratamentoPrescricao\Factory\TratamentoPrescricaoTableGatewayFactory',
            'TratamentoPrescricaoTable' => 'TratamentoPrescricao\Factory\TratamentoPrescricaoTableFactory'
        ]
    ],    
    'controllers' => [
        'invokables' => [
            'TratamentoIndicacaoIndex'   => 'TratamentoIndicacao\Controller\IndexController',
            'TratamentoIndicacaoWrite'   => 'TratamentoIndicacao\Controller\WriteController',
            'TratamentoIndicacaoDelete'  => 'TratamentoIndicacao\Controller\DeleteController',
            'TratamentoPrescricaoIndex'  => 'TratamentoPrescricao\Controller\IndexController',
            'TratamentoPrescricaoWrite'  => 'TratamentoPrescricao\Controller\WriteController',
            'TratamentoPrescricaoDelete' => 'TratamentoPrescricao\Controller\DeleteController',
            'TratamentoPrescricaoVinculaIndex' => 'TratamentoPrescricaoVincula\Controller\IndexController'
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'burg_passaro' => __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'    
        ]
    ],
    'router' => [
        'routes' => [
            'tratamento_indicacao' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tratamento_indicacoes',
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
                    ],
                    'delete' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => 'TratamentoIndicacaoDelete',
                                'action' => 'delete'
                            ]
                        ]
                    ]
                ]
            ],
            'tratamento_prescricao' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tratamento_prescricoes',
                    'defaults' => [
                        'controller' => 'TratamentoPrescricaoIndex',
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
                                'controller' => 'TratamentoPrescricaoWrite',
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
                                'controller' => 'TratamentoPrescricaoWrite',
                                'action' => 'add'
                            ]
                        ]
                    ],
                    'delete' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => 'TratamentoPrescricaoDelete',
                                'action' => 'delete'
                            ]
                        ]
                    ]
                ]
            ],
            'tratamento_prescricao_vincula' => [
                'type' => 'literal',
                'options' => [
                    'route' => '/tratamento_prescricao_vinculacoes',
                    'defaults' => [
                        'controller' => 'TratamentoPrescricaoVinculaIndex',
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
                                'controller' => 'TratamentoPrescricaoVinculaWrite',
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
                                'controller' => 'TratamentoPrescricaoVinculaWrite',
                                'action' => 'add'
                            ]
                        ]
                    ],
                    'delete' => [
                        'type' => 'segment',
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => 'TratamentoPrescricaoVinculaDelete',
                                'action' => 'delete'
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ]
];