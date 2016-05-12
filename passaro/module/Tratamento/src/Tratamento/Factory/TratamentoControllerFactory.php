<?php

namespace Tratamento\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

use Tratamento\Form\TratamentoForm;
use Tratamento\Form\TratamentoFilter;
use Tratamento\Model\Tratamento;
use Tratamento\Controller\TratamentoController;  

class TratamentoControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $form = new TratamentoForm();
        $form->setInputFilter(new TratamentoFilter());
        $form->bind(new Tratamento());
        return new TratamentoController($form);
    }

}

