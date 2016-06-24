<?php
namespace TratamentoPrescricao\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use TratamentoPrescricao\Model\TratamentoPrescricaoTable;

class TratamentoPrescricaoTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('TratamentoPrescricaoTableGateway');
        return new TratamentoPrescricaoTable($tableGateway);
    }

}

