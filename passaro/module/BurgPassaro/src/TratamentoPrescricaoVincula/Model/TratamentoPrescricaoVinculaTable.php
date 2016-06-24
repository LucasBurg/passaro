<?php
namespace TratamentoPrescricaoVincula\Model;

use Zend\Db\TableGateway\TableGateway;
use Exception;

class TratamentoPrescricaoVinculaTable 
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
    
    
    public function fetchOne($tratamentoDuracaoId, $tratamentoIndicacaoId, $tratamentoPrescricaoId)
    {
        $where = [
            'tratamento_duracao_id' => $tratamentoDuracaoId,
            'tratamento_indicacao_id' => $tratamentoIndicacaoId,
            'tratamento_prescricao_id' => $tratamentoPrescricaoId
        ];
        
        $rowSet = $this->tableGateway->select($where);
        return $rowSet->current();
    }
    
    
    public function insert(TratamentoPrescricaoVinculaModel $model) 
    {
        $data = [
            'tratamento_duracao_id' => $model->tratamentoDuracaoId,
            'tratamento_indicacao_id' => $model->tratamentoIndicacaoId,
            'tratamento_prescricao_id' => $model->tratamentoPrescricaoId
        ];
        $row = $this->fetchOne(
                $model->tratamentoDuracaoId,
                $model->tratamentoIndicacaoId, 
                $model->tratamentoPrescricaoId);    
        if ($row) {
            throw new Exception("A vinculação já existe!");
        } 
        $this->tableGateway->insert($data);
    }
    
    public function delete(TratamentoPrescricaoVinculaModel $model)
    {
        $where = [
            'tratamento_duracao_id' => $model->tratamentoDuracaoId,
            'tratamento_indicacao_id' => $model->tratamentoIndicacaoId,
            'tratamento_prescricao_id' => $model->tratamentoPrescricaoId
        ];
        $this->tableGateway->delete($where);
    }
}
