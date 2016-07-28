<?php

namespace Passaro\Model;

use Zend\Db\TableGateway\TableGateway;
use Passaro\Model\Passaro;
use Exception;

class PassaroTable 
{
    private $tableGateway;
    
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
        throw new Exception("Pássaro não encontrado. [id = {$id}]");
    }
    
    public function save(Passaro $passaro) 
    {
        $data = [
            'especie_id'       => $passaro->especie_id,
            'nome'             => $passaro->nome,
            'data_entrada'     => $passaro->data_entrada,
            'data_saida'       => $passaro->data_saida,
            'data_nascimento'  => $passaro->data_nascimento,
            'data_falecimento' => $passaro->data_falecimento,
            'sexo'             => $passaro->sexo    
        ];
        
        try {
            if ($passaro->id) {
                $this->tableGateway->update($data, ['id' => $passaro->id]);
            } else {
                $this->tableGateway->insert($data);
            }
            return true;
        } catch (Exception $ex) {
            throw new Exception($ex->getMessage());
        }
    }
    
    public function getLastId() 
    {
        return $this->tableGateway->getLastInsertValue();
    }
    
    public function delete($id) 
    {
        return $this->tableGateway->delete(['id' => $id]);
    }
    
}

