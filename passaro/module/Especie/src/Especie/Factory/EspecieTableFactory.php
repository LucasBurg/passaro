<?php

namespace Especie\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Especie\Model\EspecieTable;


class EspecieTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('EspecieTableGateway');
        return new EspecieTable($tableGateway); 
    }
}

