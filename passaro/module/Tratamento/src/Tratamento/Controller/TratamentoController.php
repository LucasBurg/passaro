<?php

namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Tratamento\Form\TratamentoForm;
use Tratamento\Model\TratamentoTable;

class TratamentoController extends AbstractActionController 
{
    private $tratamentoTable;
    
    private $form;
    
    public function __construct(
        TratamentoForm $form,
        TratamentoTable $tratamentoTable
    ) {
        $this->form = $form;
        $this->tratamentoTable = $tratamentoTable;
    }
    
    public function indexAction()
    {
        $resultSet = $this->tratamentoTable->fetchAll();
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
            $this->tratamentoTable->save($form->getData());
        }
        
    }
}

