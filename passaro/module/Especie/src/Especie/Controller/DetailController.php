<?php

namespace Especie\Controller;

use Zend\Mvc\Controller\AbstractActionController;

use Especie\Form\EspecieForm;

class DetailController extends AbstractActionController
{
    private $especieTable;
    
    public function indexAction()
    {
        $id = $this->params()->fromRoute('id', 0);
        $especie = $this->getEspecieTable()->fetchOne($id);
        $form = new EspecieForm();
        $form->bind($especie);
        $req = $this->getRequest();
        if ($req->isPost()) {
            $form->setData($req->getPost());
            if ($form->isValid()) {
                $this->getEspecieTable()->save($especie);
                return $this->redirect()->toRoute('especies');
            }
        } 
        return ['id' => $id, 'form' => $form];
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