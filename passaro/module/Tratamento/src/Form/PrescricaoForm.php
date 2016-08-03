<?php
namespace Tratamento\Form;

use Zend\Form\Form;

class PrescricaoForm extends Form
{
    public function __construct()
    {
        parent::__construct('tratamento_prescricoes');
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
            ],
            'attributes' => [
                'class' => 'form-control'
            ]
        ]);
        
        $this->add([
            'name' => 'descricao',
            'type' => 'textarea',
            'options' => [
                'label' => 'Descrição'
            ],
            'attributes' => [
                'class' => 'form-control',
                'cols' => 100,
                'rows' => 10
            ]
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Salvar',
                'id' => 'btn_save',
                'class' => 'btn btn-primary'
            ]
        ]);
    } 
    
    
}

