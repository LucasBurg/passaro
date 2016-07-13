<?php

namespace Passaro\Form;


use Zend\InputFilter\InputFilter;

use Zend\Form\Form;


class PassaroForm extends Form
{
    public function __construct()
    {
        parent::__construct('passaro');
        
        $this->setInputFilter(new InputFilter());
        
        $this->add([
            'name' => 'id',
            'type' => 'hidden'
        ]);
        
        $this->add([
            'name' => 'especie_id',
            'type' => 'select',
            'options' => [
                'label' => 'Espécies',
                'empty_option' => '---',
            ]
        ]);
        
        $this->add([
            'name' => 'nome',
            'type' => 'text',
            'options' => [
                'label' => 'Nome'
            ]
        ]);
        
        $this->add([
            'name' => 'data_entrada',
            'type' => 'text',
            'options' => [
                'label' => 'Data entrada'
            ]
        ]);
        
        $this->add([
            'name' => 'data_saida',
            'type' => 'text',
            'options' => [
                'label' => 'Data saida'
            ]
        ]);
        
        $this->add([
            'name' => 'data_nascimento',
            'type' => 'text',
            'options' => [
                'label' => 'Data nascimento'
            ]
        ]);
        
        $this->add([
            'name' => 'data_falecimento',
            'type' => 'text',
            'options' => [
                'label' => 'Data falecimento'
            ]
        ]);
        
        $this->add([
            'name' => 'sexo',
            'type' => 'select',
            'options' => [
                'label' => 'Sexo',
                'empty_option' => '---',
                'disable_inarray_validator' => true,
                'value_options' => [
                    'M' => 'Macho',
                    'F' => 'Fêmea'
                ]
            ]
        ]);
        
        $this->add([
            'name' => 'submit',
            'type' => 'submit',
            'attributes' => [
                'value' => 'Salvar',
                'id' => 'submit',
                'class' => 'btn btn-primary'
            ]
        ]);
    }
}
