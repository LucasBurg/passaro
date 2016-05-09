<?php

namespace Passaro\Model;

class Passaro 
{
    public $id;
    
    public $especie_id;
    
    public $nome;
    
    public $data_entrada;
    
    public $data_saida;
    
    public $data_nascimento;
    
    public $data_falecimento;
    
    public $sexo;
    
    public function exchangeArray($data) 
    {
        $this->id = ($data['id']) ? $data['id'] : null;
        $this->especie_id = ($data['especie_id']) ? $data['especie_id'] : null;
        $this->nome = ($data['nome']) ? $data['nome'] : null;
        $this->data_entrada = ($data['data_entrada']) ? $data['data_entrada'] : null;
        $this->data_saida = ($data['data_saida']) ? $data['data_saida'] : null;
        $this->data_nascimento = ($data['data_nascimento']) ? $data['data_nascimento'] : null;
        $this->data_falecimento = ($data['data_falecimento']) ? $data['data_falecimento'] : null;
        $this->sexo = ($data['sexo']) ? $data['sexo'] : null;
    }
    
    public function getArrayCopy()
    {
        return get_class_vars($this);
    }
}

