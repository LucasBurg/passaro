<?php
namespace Tratamento\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;
use Tratamento\Model\IndicacaoTable;

class IndicacaoIndexController extends AbstractActionController
{
    private $indicacaoTable;

    public function __construct(IndicacaoTable $table)
    {
        $this->indicacaoTable = $table;
    }

    public function indexAction()
    {
        $data = $this->indicacaoTable->fetchAll();
        if ($this->getRequest()->isXmlHttpRequest()) {
            return new JsonModel($data);
        }
        return new ViewModel(['indicacoes' => $data]);
    }
}