<?php
namespace Especie\Model;

class Especie 
{
    public $id;
    
    public $nome;
    
    public function exchangeArray($data)
    {
        $this->id = ($data['id']) ? $data['id'] : null; 
        $this->nome = ($data['nome']) ? $data['nome'] : null;
    }
    
}

