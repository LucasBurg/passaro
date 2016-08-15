<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Tratamento\Form\IndicacaoForm;
use Tratamento\Model\IndicacaoModel;
use Tratamento\Model\IndicacaoTable;

class IndicacaoWriteController extends AbstractActionController
{ 
    private $indicacaoForm;
    
    private $indicacaoModel;
    
    private $indicacaoTable;
    
    public function __construct(
        IndicacaoForm $form,
        IndicacaoModel $model,
        IndicacaoTable $table    
    ) {
        $this->indicacaoForm = $form;
        $this->indicacaoModel = $model;
        $this->indicacaoTable = $table;
    }
    
    
    public function addAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->indicacaoForm->setData($request->getPost());
            if ($this->indicacaoForm->isValid()) {
                $this->indicacaoTable()->save($this->indicacaoModel);
                return $this->redirect()->toRoute('tratamento_indicacoes');
            }
        }
        return new ViewModel(['form' => $this->indicacaoForm]);
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

