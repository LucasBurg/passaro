<?php

namespace Passaro\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Passaro\Model\PassaroTable;

class PassaroTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('PassaroTableGateway');
        return new PassaroTable($tableGateway);
    }
}

