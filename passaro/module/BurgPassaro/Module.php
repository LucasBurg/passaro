<?php
/**
 * @author Lucas Mota
 * @since 16/06/2016
 */
namespace BurgPassaro;

class Module
{
    public function getAutoloaderConfig()
    {
        return [
            'Zend\Loader\StandardAutoloader' => [
                'namespaces' => [
                    'TratamentoIndicacao' => __DIR__ . '/src/TratamentoIndicacao',
                ]
            ]
        ];
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}