<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use Tratamento\Model\Tratamento;
use Tratamento\Model\TratamentoTable;

class TratamentoTableFactory implements FactoryInterface  
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $adapter = $container->get('Passaro\Db\Adapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new Tratamento());
        $tableGateway = new TableGateway('tratamento', $adapter, null, $resultSet);
        return new TratamentoTable($tableGateway);
    }
}

