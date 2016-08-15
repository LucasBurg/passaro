<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


use Tratamento\Form\IndicacaoForm;
use Tratamento\Form\IndicacaoFilter;
use Tratamento\Model\IndicacaoTable;
use Tratamento\Model\IndicacaoModel;
use Tratamento\Controller\IndicacaoWriteController;


class IndicacaoWriteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(IndicacaoTable::class);
        $model = new IndicacaoModel();
        $form = new IndicacaoForm();
        $form->setInputFilter(new IndicacaoFilter());
        $form->bind($model);
        return new IndicacaoWriteController($form, $model, $table);
    }
}

