<?php

namespace Especie\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Especie\Form\EspecieForm;

class DetailController extends AbstractActionController
{
    private $especieTable;
    
    public function indexAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $row = $this->getEspecieTable()->fetchOne($id);
        
        $form = new EspecieForm();
        
        $form->bind($row);
        
        
        return ['id' => $id, 'especie' => $row, 'form' => $form];
    }
    
    private function getEspecieTable()
    {
        if ($this->especieTable) {
            return $this->especieTable; 
        }
        $this->especieTable = $this->getServiceLocator()->get('EspecieTable');
        return $this->especieTable;
    }
}