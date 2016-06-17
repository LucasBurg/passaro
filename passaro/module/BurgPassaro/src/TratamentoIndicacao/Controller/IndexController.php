<?php
namespace TratamentoIndicacao\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    private $tratamentoIndicacaoTable;

    public function indexAction()
    {
        $table = $this->getTratamentoIndicacaoTable();
        $data = ['indicacoes' => $table->fetchAll()];
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