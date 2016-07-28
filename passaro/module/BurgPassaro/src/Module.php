<?php
/**
 * @author Lucas Mota
 * @since 16/06/2016
 */
namespace BurgPassaro;

use Zend\ModuleManager\Feature\ConfigProviderInterface;

class Module implements ConfigProviderInterface
{
    public function getConfig()
    {
        return include __DIR__ . '/../config/module.config.php';
    }
}