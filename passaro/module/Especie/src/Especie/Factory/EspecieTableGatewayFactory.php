<?php

namespace Especie\Factory;


use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Especie\Model\Especie;

class EspecieTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('ZendDbAdapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Especie());
        return new TableGateway('especie', $adapter, null, $resultSet);
    }

}

