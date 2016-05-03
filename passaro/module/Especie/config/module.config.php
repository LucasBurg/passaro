<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Especie\Controller\Index' => 'Especie\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            'especie' => __DIR__ . '/../view',
        ),
    ),
    'router' => array(
        'routes' => array(
            'especies' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/especies',
                    'defaults' => array(
                        'controller' => 'Especie\Controller\Index',
                        'action' => 'index'
                    ) 
                )
            )
        )
    )
);