<?php
namespace TratamentoPrescricaoVincula\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use TratamentoPrescricaoVincula\Model\TratamentoPrescricaoVinculaTable;

class TratamentoPrescricaoVinculaTableFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $tableGateway = $serviceLocator->get('TratamentoPrescricaoVinculaTableGateway');
        return new TratamentoPrescricaoVinculaTable($tableGateway);
    }

}

