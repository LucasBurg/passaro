<?php

namespace Tratamento\Model;

use Zend\Db\TableGateway\TableGateway;

use Tratamento\Model\Tratamento;

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
}

