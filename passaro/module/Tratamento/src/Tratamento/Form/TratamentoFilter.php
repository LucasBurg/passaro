<?php

namespace Tratamento\Form;

use Zend\InputFilter\InputFilter;

class TratamentoFilter extends InputFilter
{
    public function __construct()
    {
        $this->add([
            'name' => 'id',
            'required' => false,
            'filters' => [
                ['name' => 'Int']
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
                        'max' => 100
                    ]
                ]
            ]
        ]);
    }
}
