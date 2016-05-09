<?php

namespace Passaro\Model;

use Zend\Db\TableGateway\TableGateway;

class PassaroTable 
{
    private $tableGateway;
    
    public function __construct(TableGateway $tableGateway)
    {
        $this->tableGateway = $tableGateway;
    } 
    
    public function fetchAll()
    {
        return $this->tableGateway->select();
    }
}

