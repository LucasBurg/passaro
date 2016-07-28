<?php
namespace Tratamento;

return [
    'service_manager' => [
        'factories' => [
            Model\TratamentoTable::class => Factory\TratamentoTableFactory::class 
        ]
    ],
    'controllers' => [
        'factories' => [
            Controller\TratamentoController::class => Factory\TratamentoControllerFactory::class
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
                        'controller' => Controller\TratamentoController::class,
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