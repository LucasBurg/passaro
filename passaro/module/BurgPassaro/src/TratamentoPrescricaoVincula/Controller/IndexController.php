<?php
namespace TratamentoPrescricaoVincula\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

class IndexController extends AbstractActionController
{
    protected $tratamentoPrescricaoVinculaTable;
    
    public function indexAction()
    {
        
        $req = $this->getRequest();
        
        if ($req->isXmlHttpRequest()) {
            $table = $this->getTratamentoPrescricaoVinculaTable();
            $data = $table->fetchAll();
            return new JsonModel($data);
        }
        
        return new ViewModel();
    }
    
    private function getTratamentoPrescricaoVinculaTable()
    {
        if ($this->tratamentoPrescricaoVinculaTable) {
            return $this->tratamentoPrescricaoVinculaTable;
        }
        $this->tratamentoPrescricaoVinculaTable = $this->getServiceLocator()->get('TratamentoPrescricaoVinculaTable');
        return $this->tratamentoPrescricaoVinculaTable;
    }
}

