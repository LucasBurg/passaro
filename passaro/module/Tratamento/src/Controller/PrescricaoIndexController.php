<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

use Tratamento\Model\PrescricaoTable;

class PrescricaoIndexController extends AbstractActionController
{
    protected $prescricaoTable;
    
    public function __construct(PrescricaoTable $prescricaoTable)
    {
        $this->prescricaoTable = $prescricaoTable;
    }
    
    public function indexAction()
    {
        $req = $this->getRequest();
        
        $data = $this->prescricaoTable->fetchAll();
        
        
        
        if ($req->isXmlHttpRequest()) {
            return new JsonModel($data);
        }
        
        return new ViewModel(['prescricoes' => $data]);
    }
}

