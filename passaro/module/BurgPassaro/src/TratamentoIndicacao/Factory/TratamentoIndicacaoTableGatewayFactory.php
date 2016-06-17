<?php
namespace TratamentoIndicacao\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use TratamentoIndicacao\Model\TratamentoIndicacaoModel;

class TratamentoIndicacaoTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('ZendDbAdapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new TratamentoIndicacaoModel());
        return new TableGateway('tratamento_indicacao', $adapter, null, $resultSet);
    }

}



