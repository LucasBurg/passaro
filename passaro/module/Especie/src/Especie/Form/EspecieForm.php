<?php

namespace Especie\Form;

use Zend\Form\Form;

class EspecieForm extends Form 
{
    public function __construct()
    {
        parent::__construct('especie');
        
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
                'id' => 'btn_salvar'
            ]
        ]);
    }
}