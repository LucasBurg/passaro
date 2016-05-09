<?php
return [
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

        ]
    ]
];