<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

use Tratamento\Model\PrescricaoTable;

class PrescricaoDeleteController extends AbstractActionController
{
    private $prescricaoTable;
    
    public function __construct(PrescricaoTable $table)
    {
        $this->prescricaoTable = $table;
    }
    
    public function deleteAction()
    {
        $id      = (int) $this->params()->fromRoute('id'); 
        $row     = $this->prescricaoTable->fetchOne($id);
        $request = $this->getRequest();
        
        if ($request->isPost()) {
            if ($request->getPost()->get('delete') == 'S') {
                $this->prescricaoTable->delete($row);
            }
            return $this->redirect()->toRoute('tratamento_prescricoes');
        }
        
        $data = ['id' => $id, 'nome' => $row->nome];
        return new ViewModel($data);
    }
}

