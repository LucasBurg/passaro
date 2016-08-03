<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Tratamento\Model\PrescricaoVinculaModel;
use Tratamento\Model\PrescricaoVinculaTable;

class PrescricaoVinculaTableFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new PrescricaoVinculaModel());
        $tableGateway = new TableGateway('tratamento_prescricao_vincula', $adapter, null, $resultSet);
        return new PrescricaoVinculaTable($tableGateway);
    }
}

