<?php
namespace TratamentoPrescricao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use TratamentoPrescricao\Form\TratamentoPrescricaoForm;
use TratamentoPrescricao\Model\TratamentoPrescricaoModel;

class WriteController extends AbstractActionController
{ 
    private $tratamentoPrescricaoTable;
    
    public function addAction()
    {
        $form    = new TratamentoPrescricaoForm();
        $model   = new TratamentoPrescricaoModel();
        $request = $this->getRequest();
        
        $form->bind($model);
        
        if ($request->isPost()) {
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $this->getTratamentoPrescricaoTable()->save($model);
                return $this->redirect()->toRoute('tratamento_prescricao');
            }
        }
        return new ViewModel(['form' => $form]);
    }
    
    public function editAction()
    {
        $id      = (int) $this->params()->fromRoute('id');
        $table   = $this->getTratamentoPrescricaoTable();
        $row     = $table->fetchOne($id);
        $request = $this->getRequest();
        
        $form = new TratamentoPrescricaoForm();
        $form->bind($row);
        
        if ($request->isPost()) {
            $post = $request->getPost();
            $form->setData($request->getPost());
            if ($form->isValid()) {
                $table->save($row);
                return $this->redirect()->toRoute('tratamento_prescricao');
            }
        }
        
        $data = ['id' => $id, 'form' => $form];
        return new ViewModel($data);
    }
    
    private function getTratamentoPrescricaoTable()
    {
        if ($this->tratamentoPrescricaoTable) {
            return $this->tratamentoPrescricaoTable;
        }
        $this->tratamentoPrescricaoTable = $this->getServiceLocator()->get('TratamentoPrescricaoTable');
        return $this->tratamentoPrescricaoTable;
    }
    
}

