<?php

namespace Especie\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class EspecieController extends AbstractActionController
{
    private $especieTable;
    
    public function indexAction()
    {
        return ['especies' => $this->getEspecieTable()->fetchAll()];
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
    