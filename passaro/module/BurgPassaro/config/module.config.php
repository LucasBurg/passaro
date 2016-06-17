<?php
return [
    'service_manager' => [
        'factories' => [
        ]
    ],    
    'controllers' => [
        'invokables' => [
            'TratamentoIndicacaoIndex' => 'TratamentoIndicacao\Controller\IndexController'
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
                'type' => 'Literal',
                'options' => [
                    'route' => '/tratamento_indicacao',
                    'defaults' => [
                        'controller' => 'TratamentoIndicacaoIndex',
                        'action' => 'index'
                    ]
                ]
            ]
        ]
    ]
];