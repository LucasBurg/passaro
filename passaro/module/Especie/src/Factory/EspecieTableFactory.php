<?php
namespace Especie\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Especie\Model\Especie;
use Especie\Model\EspecieTable;

class EspecieTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Especie());
        $tableGateway = new TableGateway('especie', $adapter, null, $resultSet);
        return new EspecieTable($tableGateway); 
    }
}

