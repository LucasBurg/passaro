<?php
namespace Especie\Model;

use Zend\Db\TableGateway\TableGateway;

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
}

