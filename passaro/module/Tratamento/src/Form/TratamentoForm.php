<?php

namespace Tratamento\Form;

use Zend\Form\Form;

class TratamentoForm extends Form 
{
    public function __construct()
    {
        parent::__construct('tratamento');
        
        $this->setAttribute('autocomplete', 'off');
        
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'nome',
            'type' => 'text',
            'options' => [
                'label' => 'Nome'
            ]
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Salvar',
                'id' => 'submit_btn',
                'class' => 'btn btn-primary'
            ]
        ]);
    }
}

