<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Tratamento\Model\PrescricaoVinculaTable;
use Tratamento\Controller\PrescricaoVinculaIndexController;

class PrescricaoVinculaIndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(PrescricaoVinculaTable::class);
        return new PrescricaoVinculaIndexController($table);
    }
}

