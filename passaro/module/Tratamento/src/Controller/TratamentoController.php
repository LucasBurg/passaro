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
            $this->saveAction($req);
            return $this->redirect()->toRoute('tratamentos');
        }
        return ['form' => $this->form];
    }
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        if (!$id) {
            return $this->redirect()->toRoute('tratamentos');
        }
        $tratamento = $this->tratamentoTable->fetchOne($id);
        $req = $this->getRequest();
        if ($req->isPost()) {
            $this->saveAction($req);
            return $this->redirect()->toRoute('tratamentos');
        }
        $this->form->bind($tratamento);
        return ['form' => $this->form, 'id' => $id];
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        if (!$id) {
            return $this->redirect()->toRoute('tratamentos');
        }
        $req = $this->getRequest();
        if ($req->isPost()) {
            if ($req->getPost()->get('delete') == 'S') {
                $this->tratamentoTable->delete($id);
            }
            return $this->redirect()->toRoute('tratamentos');
        }
        $tratamento = $this->tratamentoTable->fetchOne($id);
        return ['tratamento' => $tratamento];
    }
    
    /**
     * Salva os posts
     */
    private function saveAction($req)
    {
        $this->form->setData($req->getPost());
        if ($this->form->isValid()) {
            $this->tratamentoTable->save($this->form->getData());
        }
    }
}

