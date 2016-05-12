<?php

namespace Tratamento\Model;

class Tratamento 
{
    public $id;
    
    public $nome;
    
    public function exchangeArray($data)
    {
        $this->id = ($data['id']) ? $data['id'] : null;
        $this->nome = ($data['nome']) ? $data['nome'] : null;
    }
    
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
}

