<?php
namespace TratamentoPrescricao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractActionController
{
    private $tratamentoPrescricaoTable;
    
    public function deleteAction()
    {
        $id      = (int) $this->params()->fromRoute('id'); 
        $request = $this->getRequest();
        $table   = $this->getTratamentoPrescricaoTable();
        $row     = $table->fetchOne($id);
        
        if ($request->isPost()) {
            if ($request->getPost()->get('delete') == 'S') {
                $table->delete($row);
            }
            return $this->redirect()->toRoute('tratamento_prescricao');
        }
        
        $data = ['id' => $id, 'nome' => $row->nome];
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

