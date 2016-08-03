<?php
namespace Tratamento;

use Zend\Router\Http\Segment;
use Zend\Router\Http\Literal;

return [
    'service_manager' => [
        'factories' => [
            Model\TratamentoTable::class => Factory\TratamentoTableFactory::class,
            Model\PrescricaoTable::class => Factory\PrescricaoTableFactory::class,
            Model\PrescricaoVinculaTable::class => Factory\PrescricaoVinculaTableFactory::class
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\TratamentoController::class => Factory\TratamentoControllerFactory::class,
            Controller\PrescricaoIndexController::class => Factory\PrescricaoIndexControllerFactory::class,
            Controller\PrescricaoWriteController::class => Factory\PrescricaoWriteControllerFactory::class,
            Controller\PrescricaoDeleteController::class => Factory\PrescricaoDeleteControllerFactory::class,
            Controller\PrescricaoVinculaIndexController::class => Factory\PrescricaoVinculaIndexControllerFactory::class
        ]
    ],
    'view_manager' => [
        'template_path_stack' => [
            'tratamento' => __DIR__ . '/../view',
        ],
        'strategies' => [
            'ViewJsonStrategy'    
        ]
    ],
    'router' => [
        'routes' => [
            'tratamentos' => [
                'type' => Segment::class,
                'options' => [
                    'route' => '/tratamentos[/:action[/:id]]',
                    'defaults' => [
                        'controller' => Controller\TratamentoController::class,
                        'action' => 'index'
                    ],
                    'constraints' => [
                        'action' => '(add|edit|delete)',
                        'id' => '[0-9]+'
                    ]
                ]
            ],
            'tratamento_prescricoes' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/tratamento_prescricoes',
                    'defaults' => [
                        'controller' => Controller\PrescricaoIndexController::class,
                        'action' => 'index'
                    ]
                ],
                'may_terminate' => true,
                'child_routes' => [
                    'edit' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/edit/:id',
                            'defaults' => [
                                'controller' => Controller\PrescricaoWriteController::class,
                                'action' => 'edit'
                            ],
                            'constraints' => [
                                'id' => '[0-9]+'
                            ]
                        ]
                    ],
                    'add' => [
                        'type' => Literal::class,
                        'options' => [
                            'route' => '/add',
                            'defaults' => [
                                'controller' => Controller\PrescricaoWriteController::class,
                                'action' => 'add'
                            ]
                        ]
                    ],
                    'delete' => [
                        'type' => Segment::class,
                        'options' => [
                            'route' => '/delete/:id',
                            'defaults' => [
                                'controller' => Controller\PrescricaoDeleteController::class,
                                'action' => 'delete'
                            ]
                        ]
                    ]
                ]
            ],
            'tratamento_prescricao_vinculacoes' => [
                'type' => Literal::class,
                'options' => [
                    'route' => '/tratamento_prescricao_vinculacoes',
                    'defaults' => [
                        'controller' => Controller\PrescricaoVinculaIndexController::class,
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