<?php
namespace Passaro\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Passaro\Form\PassaroForm;
use Passaro\Model\Passaro;

use Passaro\Model\PassaroTable;
use Especie\Model\EspecieTable;

class PassaroController extends AbstractActionController
{
    private $passaroTable;
    
    private $especieTable;
    
    public function __construct(PassaroTable $passaroTable, EspecieTable $especieTable)
    {
        $this->passaroTable = $passaroTable;
        $this->especieTable = $especieTable;
    }
    
    public function indexAction()
    {
        $passaros = $this->passaroTable->fetchAll();
        return ['passaros' => $passaros];
    }
    
    public function addAction()
    {
        $form = new PassaroForm();
        $entity = new Passaro();
        $form->bind($entity);
        $especieTable = $this->especieTable;
        $optionsSelect = $especieTable->fetchOptionsSelect();
        $form->get('especie_id')->setValueOptions($optionsSelect);
        $req = $this->getRequest();
        if ($req->isPost()) {
            if ($this->saveAction($form, $entity, $req)) {
                $id = (int) $this->passaroTable->getLastId();
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
        $passaro = $this->passaroTable->fetchOne($id); 
        $form = new PassaroForm();
        $form->bind($passaro);
        $especieTable = $this->especieTable;
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
        $passaro = $this->passaroTable->fetchOne($id);
        if (!$passaro) {
            return $this->redirect()->toRoute('passaros');
        }
        $req = $this->getRequest();
        if ($req->isPost()) {
            if ($req->getPost()->get('delete') == 'S') {
                $this->passaroTable->delete($id);
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
            $this->passaroTable->save($entity);
            return true;
        }
        return false;
    }
}
