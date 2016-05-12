<?php

namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Tratamento\Form\TratamentoForm;

class TratamentoController extends AbstractActionController 
{
    private $tratamentoTable;
    
    private $form;
    
    public function __construct(
        TratamentoForm $form
    ) {
        $this->form = $form;
    }
    
    
    public function indexAction()
    {
        $resultSet = $this->getTratamentoTable()->fetchAll();
        return ['tratamentos' => $resultSet];
    }
    
    public function addAction()
    {
        $req = $this->getRequest();
        
        if ($req->isPost()) {
            $this->saveAction($this->form, $req);
        }
        
        
        return ['form' => $this->form];
    }
    
    public function editAction()
    {
        return [];
    }
    
    public function deleteAction()
    {
        return [];
    }
    
    /**
     * Salva os posts
     */
    private function saveAction($form, $req)
    {
        $form->setData($req->getPost());
        if ($form->isValid()) {
            $this->getTratamentoTable()->save($form->getData());
        }
        
    }
    
    /**
     * Retorna um tableGateway da table tratamento
     */
    private function getTratamentoTable()
    {
        if (!$this->tratamentoTable) {
            $this->tratamentoTable = $this->getServiceLocator()->get('TratamentoTable');
        }
        return $this->tratamentoTable;
    }
}

