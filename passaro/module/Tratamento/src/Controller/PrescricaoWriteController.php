<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Tratamento\Model\PrescricaoModel;
use Tratamento\Form\PrescricaoForm;
use Tratamento\Model\PrescricaoTable;

class PrescricaoWriteController extends AbstractActionController
{ 
    private $prescricaoTable;
    
    private $prescricaoModel;
    
    private $prescricaoForm;
    
    public function __construct(
        PrescricaoModel $model,
        PrescricaoForm $form,
        PrescricaoTable $table    
    ) {
        $this->prescricaoModel = $model;
        $this->prescricaoForm = $form;
        $this->prescricaoTable = $table;
    }
    
    public function addAction()
    {
        $request = $this->getRequest();
        if ($request->isPost()) {
            $this->prescricaoForm->setData($request->getPost());
            if ($this->prescricaoForm->isValid()) {
                $this->prescricaoTable->save($this->prescricaoModel);
                return $this->redirect()->toRoute('tratamento_prescricoes');
            }
        }
        return new ViewModel(['form' => $this->prescricaoForm]);
    }
    
    public function editAction()
    {
        $id      = (int) $this->params()->fromRoute('id');
        $row     = $this->prescricaoTable->fetchOne($id);
        $request = $this->getRequest();
        
        $this->prescricaoForm->bind($row);
        
        if ($request->isPost()) {
            $post = $request->getPost();
            $this->prescricaoForm->setData($request->getPost());
            if ($this->prescricaoForm->isValid()) {
                $this->prescricaoTable->save($row);
                return $this->redirect()->toRoute('tratamento_prescricoes');
            }
        }
        
        $data = ['id' => $id, 'form' => $this->prescricaoForm];
        return new ViewModel($data);
    }
    
    
    
}

