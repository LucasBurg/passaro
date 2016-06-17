<?php
namespace TratamentoIndicacao\Model;

class TratamentoIndicacaoModel 
{
    public $id;
    
    public $nome;
    
    public $descricao;
    
    public function exchangeArray($data)
    {
        $this->id        = ($data['id'])        ? $data['id']        : null; 
        $this->nome      = ($data['nome'])      ? $data['nome']      : null;
        $this->descricao = ($data['descricao']) ? $data['descricao'] : null; 
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

