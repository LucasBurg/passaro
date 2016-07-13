<?php

namespace Especie\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;

use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Especie\Model\Especie;

class EspecieTableGatewayFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Especie());
        return new TableGateway('especie', $adapter, null, $resultSet);
    }
}

