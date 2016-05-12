<?php

namespace Passaro\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Passaro\Model\Passaro;

class PassaroTableGatewayFactory implements FactoryInterface 
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('ZendDbAdapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Passaro());
        return new TableGateway('passaro', $adapter, null, $resultSet); 
    }
}

