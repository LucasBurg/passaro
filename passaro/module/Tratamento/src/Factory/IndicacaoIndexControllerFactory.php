<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Tratamento\Model\IndicacaoTable;
use Tratamento\Controller\IndicacaoIndexController;

class IndicacaoIndexControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(IndicacaoTable::class);
        return new IndicacaoIndexController($table);
    }
}

