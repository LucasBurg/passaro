<?php
namespace TratamentoIndicacao\Model;

use Zend\Db\TableGateway\TableGateway;
use Exception;

class TratamentoIndicacaoTable 
{
    protected $tableGateway;   
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    }
    
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
    
    public function fetchOne($id)
    {
        $id = (int) $id;
        $rowSet = $this->tableGateway->select(['id' => $id]);
        $row = $rowSet->current();
        if ($row) {
            return $row;
        }
        throw new Exception("Não foi possível encontrar a indicação com o id {$id}");
    }
}
