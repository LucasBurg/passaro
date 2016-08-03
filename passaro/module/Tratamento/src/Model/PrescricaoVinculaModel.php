<?php
namespace Tratamento\Model;

class PrescricaoVinculaModel 
{
    public $tratamentoDuracaoId;
    
    public $tratamentoIndicacaoId;
    
    public $tratamentoPrescricaoId;
    
    public function exchangeArray($data)
    {
        $this->tratamentoDuracaoId    = ($data['tratamento_duracao_id'])    
                ? $data['tratamento_duracao_id'] : null;
        $this->tratamentoIndicacaoId  = ($data['tratamento_indicacao_id'])  
                ? $data['tratamento_indicacao_id'] : null;
        $this->tratamentoPrescricaoId = ($data['tratamento_prescricao_id']) 
                ? $data['tratamento_prescricao_id'] : null;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

