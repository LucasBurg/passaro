<?php
namespace TratamentoPrescricao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $tratamentoPrescricaoTable;
    
    public function indexAction()
    {
        $table = $this->getTratamentoPrescricaoTable();
        
        $data = $table->fetchAll();
        
        if ($this->getRequest()->isXmlHttpRequest()) {
            return new \Zend\View\Model\JsonModel($data);
        }
        
        return new ViewModel(['prescricoes' => $data]);
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

