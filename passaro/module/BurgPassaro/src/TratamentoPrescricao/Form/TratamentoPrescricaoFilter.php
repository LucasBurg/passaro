<?php
namespace TratamentoPrescricao\Form;

use Zend\InputFilter\InputFilter;

class TratamentoPrescricaoFilter extends InputFilter
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

