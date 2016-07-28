<?php
namespace Especie\Model;

use Zend\Db\TableGateway\TableGateway;
use Exception;

class EspecieTable 
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
        throw new Exception("Espécie não encontrada. [id = {$id}]");
    }
    
    public function save(Especie $especie)
    {
        $data = [
            'nome' => $especie->nome
        ];
        
        if ($especie->id) {
            $this->tableGateway->update($data, ['id' => $especie->id]);
        } else {
            $this->tableGateway->insert($data);
        }
        
        return true;
    }
    
    public function getLastId()
    {
        return $this->tableGateway->getLastInsertValue();
    }
    
    public function delete($id)
    {
        $especie = $this->fetchOne($id);
        
        if ($especie->id) {
            $this->tableGateway->delete(['id' => $especie->id]);
            return true;
        }
        
        return false;
    }
    
    /**
     * Retorna um array estruturado para options do elemento select
     */
    public function fetchOptionsSelect()
    {
        $especies = $this->fetchAll();
        $optionsSelect = [];
        foreach ($especies as $especie) {
            $optionsSelect[$especie->id] = $especie->nome;
        }
        return $optionsSelect;
    }
}

