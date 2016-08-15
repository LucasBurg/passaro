<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Tratamento\Model\IndicacaoModel;
use Tratamento\Model\IndicacaoTable;

class IndicacaoTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new IndicacaoModel());
        $tableGateway = new TableGateway('tratamento_indicacao', $adapter, null, $resultSet);
        return new IndicacaoTable($tableGateway);
    }
}

