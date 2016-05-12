<?php

namespace Tratamento\Model;

use Zend\Db\TableGateway\TableGateway;
use Tratamento\Model\Tratamento;
use Exception;

class TratamentoTable 
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
        throw new Exception("O registro não foi encontrado. [id => {$id}]");
    }
    
    public function save(Tratamento $tratamento)
    {
        $data = [
            'nome' => $tratamento->nome    
        ];
        try {
            if ($tratamento->id) {
                $this->tableGateway->update($data, ['id' => $tratamento->id]);
            } else {
                $this->tableGateway->insert($data);
            }
        } catch (Exception $ex) {
            throw new Exception('Não foi possivel salvar o tratamento.');
        }
    }
    
    public function delete($id)
    {
        $id = (int) $id;
        $row = $this->fetchOne($id);
        if ($row) {
            $this->tableGateway->delete(['id' => $id]);
        }
    }
    
    public function getLastId()
    {
        return $this->tableGateway->getLastInsertValue();
    }
}

