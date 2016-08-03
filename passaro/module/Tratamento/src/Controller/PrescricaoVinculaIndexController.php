<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Tratamento\Model\PrescricaoVinculaTable;

class PrescricaoVinculaIndexController extends AbstractActionController
{
    protected $prescricaoVinculaTable;
    
    public function __construct(PrescricaoVinculaTable $table)
    {
        $this->prescricaoVinculaTable = $table;
    }

    public function indexAction()
    {
        $req = $this->getRequest();
        if ($req->isXmlHttpRequest()) {
            $data = $this->prescricaoVinculaTable->fetchAll();
            return new JsonModel($data);
        }
        return new ViewModel();
    }
}

