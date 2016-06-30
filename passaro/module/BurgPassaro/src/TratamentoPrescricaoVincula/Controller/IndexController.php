<?php
namespace TratamentoPrescricaoVincula\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Json\Json;

class IndexController extends AbstractActionController
{
    protected $tratamentoPrescricaoVinculaTable;
    
    public function indexAction()
    {
        //$table = $this->getTratamentoPrescricaoVinculaTable();
        //$data = ['vinculacoes' => $table->fetchAll()];
        $data = ['vinculacoes' => ''];
        
        $req = $this->getRequest();
        $res = $this->getResponse();
        
        $model = new ViewModel($data);
        
        $model->setTerminal($req->isXmlHttpRequest());
        
        if ($req->isXmlHttpRequest()) {
            $res->setContent(Json::encode(['nome' => 'Lucas']));
            $model = $res;
        }
        
        return $model;
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

