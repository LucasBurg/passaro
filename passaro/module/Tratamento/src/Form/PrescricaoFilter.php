<?php
namespace Tratamento\Form;

use Zend\InputFilter\InputFilter;

class PrescricaoFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'required' => false,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 11
                    ]
                ]
            ]
        ]);
        
        $this->add([
            'name' => 'nome',
            'required' => true,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 45
                    ]
                ]
            ]
        ]);
        
        $this->add([
            'name' => 'descricao',
            'required' => false,
            'filters' => [
                ['name' => 'StripTags'],
                ['name' => 'StringTrim']
            ],
            'validators' => [
                [
                    'name' => 'StringLength',
                    'options' => [
                        'max' => 100
                    ]
                ]
            ]
        ]);
        
        
    }
    
}

