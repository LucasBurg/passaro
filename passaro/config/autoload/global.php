<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return [
    'navigation' => [
        'default' => [
            [
                'label' => 'Home',
                'route' => 'home'
            ],
            [
                'label' => 'Espécies',
                'route' => 'especies'
            ],
            [
                'label' => 'Pássaros',
                'route' => 'passaros'
            ]
        ]
    ],
    'service_manager' => [
        'factories' => [
            'navigation' => Zend\Navigation\Service\DefaultNavigationFactory::class
        ]
    ],
    'db' => [
        'adapters' => [
            'Passaro\Db\Adapter' => [
                'driver' => 'Pdo',
                'dsn' => 'mysql:dbname=passaro;host=localhost;charset=utf8'
            ]
        ]
    ],
    
];
