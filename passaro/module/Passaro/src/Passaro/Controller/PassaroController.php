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
    
    public function addAction()
    {
        return [];
    }
    
    public function editAction()
    {
        return [];
    }
    
    public function deleteAction()
    {
        return [];
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
