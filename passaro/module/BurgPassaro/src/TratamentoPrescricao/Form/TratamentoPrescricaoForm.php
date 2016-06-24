<?php
namespace TratamentoPrescricao\Form;

use Zend\Form\Form;
use TratamentoPrescricao\Form\TratamentoPrescricaoFilter;

class TratamentoPrescricaoForm extends Form
{
    public function __construct()
    {
        parent::__construct('tratamento_indicacao');
        
        $this->setInputFilter(new TratamentoPrescricaoFilter());
        
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

