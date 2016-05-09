<?php

namespace Passaro\Controller;

use Zend\Mvc\Controller\AbstractActionController;

class PassaroController extends AbstractActionController
{
    private $passaroTable;
    
    public function indexAction()
    {
        $passaros = $this->getPassaroTable()->fetchAll();
        return ['passaros' => $passaros];
    }
    
    private function getPassaroTable() 
    {
        if ($this->passaroTable) {
            return $this->passaroTable;
        }
        $this->passaroTable = $this->getServiceLocator()->get('PassaroTable');
        return $this->passaroTable;
    }
}
