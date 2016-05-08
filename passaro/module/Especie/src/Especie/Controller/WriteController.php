<?php
namespace Especie\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Especie\Form\EspecieForm;

class WriteController extends AbstractActionController
{
    public function addAction()
    {
        $form = new EspecieForm();
        
        return ['form' => $form];
    }
}

