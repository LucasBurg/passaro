<?php
namespace TratamentoIndicacao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class DeleteController extends AbstractActionController
{
    private $tratamentoIndicacaoTable;
    
    public function deleteAction()
    {
        $id      = (int) $this->params()->fromRoute('id'); 
        $request = $this->getRequest();
        $table   = $this->getTratamentoIndicacaoTable();
        $row     = $table->fetchOne($id);
        
        if ($request->isPost()) {
            if ($request->getPost()->get('delete') == 'S') {
                $table->delete($row);
            }
            return $this->redirect()->toRoute('tratamento_indicacao');
        }
        
        $data = ['id' => $id, 'nome' => $row->nome];
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

