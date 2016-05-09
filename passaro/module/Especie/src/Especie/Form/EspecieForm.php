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
            'name' => 'submit_save',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Salvar',
                'id' => 'btn_save',
                'class' => 'btn btn-primary'
            ]
        ]);
        $this->add([
            'name' => 'submit_delete',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Deletar',
                'id' => 'btn_delete',
                'class' => 'btn btn-danger'
            ]
        ]);
        $this->add([
            'name' => 'submit_new',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Novo',
                'id' => 'btn_new',
                'class' => 'btn btn-default'
            ]
        ]);
    }
}