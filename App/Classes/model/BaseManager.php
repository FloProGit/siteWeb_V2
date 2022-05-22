<?php
namespace App\Classes\model;

class BaseManager
{
    protected $_bdd;

    public function __construct(string $table)
    {
        $this->_table = $table;    
        $this->_bdd = BDD::getInstance();
    }
}