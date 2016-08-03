<?php
namespace Tratamento\Factory;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;


use Tratamento\Model\PrescricaoModel;
use Tratamento\Model\PrescricaoTable;
use Tratamento\Form\PrescricaoForm;
use Tratamento\Form\TratamentoFilter;

use Tratamento\Controller\PrescricaoWriteController;

class PrescricaoWriteControllerFactory implements FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $table = $container->get(PrescricaoTable::class);
        $model = new PrescricaoModel();
        $form = new PrescricaoForm();
        $filter = new TratamentoFilter();
        
        $form->setInputFilter($filter);
        $form->bind($model);
                
        
        return new PrescricaoWriteController($model, $form, $table);
    }
}

