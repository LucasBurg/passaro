<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Tratamento\Model\PrescricaoTable;
use Tratamento\Controller\PrescricaoIndexController;

class PrescricaoIndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(PrescricaoTable::class);
        return new PrescricaoIndexController($table);
    }
}

