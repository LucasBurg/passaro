<?php
namespace TratamentoPrescricao\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use TratamentoPrescricao\Model\TratamentoPrescricaoModel;

class TratamentoPrescricaoTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('ZendDbAdapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new TratamentoPrescricaoModel());
        return new TableGateway('tratamento_prescricao', $adapter, null, $resultSet);
    }

}



