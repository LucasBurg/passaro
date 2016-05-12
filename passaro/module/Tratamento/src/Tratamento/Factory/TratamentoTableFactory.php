<?php

namespace Tratamento\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Tratamento\Model\TratamentoTable;

class TratamentoTableFactory implements FactoryInterface  
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('TratamentoTableGateway');
        return new TratamentoTable($tableGateway);
    }

}

