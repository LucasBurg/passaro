<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Tratamento\Model\PrescricaoModel;
use Tratamento\Model\PrescricaoTable;

class PrescricaoTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new PrescricaoModel());
        $tableGateway = new TableGateway('tratamento_prescricao', $adapter, null, $resultSet);
        return new PrescricaoTable($tableGateway);
    }
}

