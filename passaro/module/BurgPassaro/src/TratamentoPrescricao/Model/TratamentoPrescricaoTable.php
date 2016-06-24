<?php
namespace TratamentoPrescricao\Model;

use Zend\Db\TableGateway\TableGateway;
use Exception;

class TratamentoPrescricaoTable 
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
        throw new Exception("Não foi possível encontrar a prescrição com o id {$id}");
    }
    
    public function save(TratamentoPrescricaoModel $model) 
    {
        $data = [
            'nome' => $model->nome,
            'descricao' => $model->descricao
        ];
        
        try {
            if ($model->id) {
                $this->tableGateway->update($data, ['id' => $model->id]);
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
    
    public function delete(TratamentoPrescricaoModel $model)
    {
        $this->tableGateway->delete(['id' => $model->id]);
    }
}
