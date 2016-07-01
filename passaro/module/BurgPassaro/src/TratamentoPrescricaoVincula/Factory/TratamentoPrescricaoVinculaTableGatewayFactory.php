<?php
namespace TratamentoPrescricaoVincula\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\ResultSet\ResultSet;
use TratamentoPrescricaoVincula\Model\TratamentoPrescricaoVinculaModel;

class TratamentoPrescricaoVinculaTableGatewayFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $adapter = $serviceLocator->get('ZendDbAdapter');
        $resultSet = new ResultSet();
        $resultSet->setArrayObjectPrototype(new TratamentoPrescricaoVinculaModel());
        return new TableGateway('tratamento_prescricao_vincula', $adapter, null, $resultSet);
    }

}



