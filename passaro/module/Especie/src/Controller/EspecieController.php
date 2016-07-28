<?php
namespace Especie\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Especie\Model\EspecieTable;
use Especie\Form\EspecieForm;
use Especie\Model\Especie;

class EspecieController extends AbstractActionController
{
    private $especieTable;
    
    public function __construct(EspecieTable $especieTable) 
    {
        $this->especieTable = $especieTable;
    }
    
    public function indexAction()
    {
        return ['especies' => $this->especieTable->fetchAll()];
    }
    
    public function detailAction()
    {
        $this->execAction(['redirect' => false]);
        $id = (int) $this->params()->fromRoute('id', 0);
        $especie = $this->especieTable->fetchOne($id);
        $form = new EspecieForm();
        $form->bind($especie);
        return ['id' => $id, 'form' => $form, 'especie' => $especie];
    }
    
    public function newAction()
    {
        $this->execAction(['redirect' => true]);
        $form = new EspecieForm();
        $form->get('submit_delete')->setAttribute('disabled', true);
        return ['form' => $form];
    }
    
    private function saveAction($option)
    {
        $post = $this->getRequest()->getPost();
        $form = new EspecieForm();
        $form->setData($post);
        if ($form->isValid()) {
            $especie = new Especie();
            $especie->exchangeArray($form->getData());
            try {
                $this->especieTable->save($especie);
                $lastId = $this->especieTable->getLastId();
                if ($option['redirect']) {
                    return $this->redirect()->toRoute('especies/detail', ['id' => $lastId]);
                }
            } catch (Exception $ex) {
                var_dump($ex);    
            }
        }
    }
    
    /**
     * Deleta uma especie
     */
    private function deleteAction($option)
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if ($this->especieTable->delete($id)) {
            return $this->redirect()->toRoute('especies');
        }
    }
    
    /**
     * Verifica a ação do formulario e executa a action
     */
    private function execAction($optionSave = [], $optionDelete = [])
    {
        $req = $this->getRequest();
        if ($req->isPost()) {
            $post = $req->getPost();
            if ($post['submit_save']) {
                $this->saveAction($optionSave);
            } else if ($post['submit_delete']) {
                $this->deleteAction($optionDelete);
            } else if ($post['submit_new']) {
                return $this->redirect()->toRoute('especies/new');
            }
        }
    }
}
    