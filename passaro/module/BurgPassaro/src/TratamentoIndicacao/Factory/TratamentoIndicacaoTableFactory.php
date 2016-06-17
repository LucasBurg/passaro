<?php
namespace TratamentoIndicacao\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use TratamentoIndicacao\Model\TratamentoIndicacaoTable;

class TratamentoIndicacaoTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('TratamentoIndicacaoTableGateway');
        return new TratamentoIndicacaoTable($tableGateway);
    }

}

