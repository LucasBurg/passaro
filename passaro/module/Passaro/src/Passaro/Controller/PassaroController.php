<?php

namespace Passaro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Passaro\Form\PassaroForm;
use Passaro\Model\Passaro;

class PassaroController extends AbstractActionController
{
    private $passaroTable;
    
    private $especieTable;

    public function indexAction()
    {
        $passaros = $this->getPassaroTable()->fetchAll();
        return ['passaros' => $passaros];
    }
    
    public function addAction()
    {
        $form = new PassaroForm();
        $entity = new Passaro();
        $form->bind($entity);
        $especieTable = $this->getEspecieTable();
        $optionsSelect = $especieTable->fetchOptionsSelect();
        $form->get('especie_id')->setValueOptions($optionsSelect);
        $req = $this->getRequest();
        if ($req->isPost()) {
            if ($this->saveAction($form, $entity, $req)) {
                $id = (int) $this->getPassaroTable()->getLastId();
                return $this->redirect()->toRoute('passaros', 
                        ['action' => 'edit', 'id' => $id]);
            }
        }
        return ['form' => $form];
    }
    
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        if (!$id) {
            return $this->redirect()->toRoute('passaros', ['action' => 'add']);
        }
        $passaro = $this->getPassaroTable()->fetchOne($id); 
        $form = new PassaroForm();
        $form->bind($passaro);
        $especieTable = $this->getEspecieTable();
        $optionsSelect = $especieTable->fetchOptionsSelect();
        $form->get('especie_id')->setValueOptions($optionsSelect);
        $req = $this->getRequest();
        if ($req->isPost()) {
            $this->saveAction($form, $passaro, $req);
            return $this->redirect()->toRoute('passaros');
        }
        return ['id' => $id, 'form' => $form];
    }
    
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id');
        $passaro = $this->getPassaroTable()->fetchOne($id);
        if (!$passaro) {
            return $this->redirect()->toRoute('passaros');
        }
        $req = $this->getRequest();
        if ($req->isPost()) {
            if ($req->getPost()->get('delete') == 'S') {
                $this->getPassaroTable()->delete($id);
            } 
            $this->redirect()->toRoute('passaros');
        }
        return ['id' => $id, 'passaro' => $passaro];
    }
    
    /**
     * salva o formulario
     */
    private function saveAction($form, $entity, $req)
    {
        $postData = $req->getPost();
        $form->setData($postData);
        if ($form->isValid()) {
            $this->getPassaroTable()->save($entity);
            return true;
        }
        return false;
    }
    
    /**
     * Retorna o mapper da tabela passaro
     */
    private function getPassaroTable() 
    {
        if ($this->passaroTable) {
            return $this->passaroTable;
        }
        $this->passaroTable = $this->getServiceLocator()->get('PassaroTable');
        return $this->passaroTable;
    }
    
    /**
     * Retorna o mapper da tabela especie
     */
    private function getEspecieTable()
    {
        if ($this->especieTable) {
            return $this->especieTable; 
        }
        $this->especieTable = $this->getServiceLocator()->get('EspecieTable');
        return $this->especieTable;
    }
}
