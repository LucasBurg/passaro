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
        //$table = $this->getTratamentoPrescricaoVinculaTable();
        //$data = ['vinculacoes' => $table->fetchAll()];
        $data = ['vinculacoes' => ''];
        $req = $this->getRequest();
        
        if ($req->isXmlHttpRequest()) {
            return new JsonModel(['nome' => 'Lucas', 'idade' => 21]);
        }
        
        return new ViewModel($data);
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

