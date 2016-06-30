<?php
namespace TratamentoPrescricaoVincula\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    protected $tratamentoPrescricaoVinculaTable;
    
    public function indexAction()
    {
        //$table = $this->getTratamentoPrescricaoVinculaTable();
        //$data = ['vinculacoes' => $table->fetchAll()];
        $data = ['vinculacoes' => ''];
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

