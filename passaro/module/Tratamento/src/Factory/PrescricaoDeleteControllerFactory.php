<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Tratamento\Controller\PrescricaoDeleteController;
use Tratamento\Model\PrescricaoTable;

class PrescricaoDeleteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(PrescricaoTable::class);
        return new PrescricaoDeleteController($table);
    }
    
}

