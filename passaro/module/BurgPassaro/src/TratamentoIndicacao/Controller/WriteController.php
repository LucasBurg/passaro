<?php
namespace TratamentoIndicacao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use TratamentoIndicacao\Form\TratamentoIndicacaoForm;
use TratamentoIndicacao\Model\TratamentoIndicacaoModel;

class WriteController extends AbstractActionController
{ 
    private $tratamentoIndicacaoTable;
    
    public function addAction()
    {
        $form    = new TratamentoIndicacaoForm();
        $model   = new TratamentoIndicacaoModel();
        $request = $this->getRequest();
        
        $form->bind($model);
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getTratamentoIndicacaoTable()->save($model);
                return $this->redirect()->toRoute('tratamento_indicacao');
            }
        }
        return new ViewModel(['form' => $form]);
    }
    
    public function editAction()
    {
        $id      = (int) $this->params()->fromRoute('id');
        $table   = $this->getTratamentoIndicacaoTable();
        $row     = $table->fetchOne($id);
        $request = $this->getRequest();
        
        $form = new TratamentoIndicacaoForm();
        $form->bind($row);
        
        if ($request->isPost()) {
            $post = $request->getPost();
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $table->save($row);
                return $this->redirect()->toRoute('tratamento_indicacao');
            }
        }
        
        $data = ['id' => $id, 'form' => $form];
        return new ViewModel($data);
    }
    
    private function getTratamentoIndicacaoTable()
    {
        if ($this->tratamentoIndicacaoTable) {
            return $this->tratamentoIndicacaoTable;
        }
        $this->tratamentoIndicacaoTable = $this->getServiceLocator()->get('TratamentoIndicacaoTable');
        return $this->tratamentoIndicacaoTable;
    }
    
}

