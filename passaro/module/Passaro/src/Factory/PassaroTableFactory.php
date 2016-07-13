<?php
namespace Passaro\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Passaro\Model\Passaro;
use Passaro\Model\PassaroTable;

class PassaroTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Passaro());
        $tableGateway = new TableGateway('passaro', $adapter, null, $resultSet);
        return new PassaroTable($tableGateway); 
    }
}

