<?php
namespace Tratamento;

class Module
{
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    'Tratamento' => __DIR__ . '/src/Tratamento',
                    'Periodo'    => __DIR__ . '/src/Periodo',
                    'Indicacao'  => __DIR__ . '/src/Indicacao',
                ]
            ]
        ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}