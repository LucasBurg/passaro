<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

use Tratamento\Form\TratamentoForm;
use Tratamento\Form\TratamentoFilter;
use Tratamento\Model\Tratamento;
use Tratamento\Controller\TratamentoController;  
use Tratamento\Model\TratamentoTable;

class TratamentoControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $tratamentoTable = $container->get(TratamentoTable::class);
        $form = new TratamentoForm();
        $form->setInputFilter(new TratamentoFilter());
        $form->bind(new Tratamento());
        return new TratamentoController($form, $tratamentoTable);
    }
}

