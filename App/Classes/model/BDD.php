<?php
namespace App\Classes\model;

class BDD
{
    private $_bdd;

    private static $_instance;

    public static function getInstance() :\PDO
    {
        if(empty(self::$_instance))
        {
            self::$_instance = new BDD();
        }
        return self::$_instance->_bdd;
    }

    public function __construct()
    {
        var_dump( $_ENV);
        $dbname = 'test';
        $host = $_ENV['DATABASE_DNS'];
        $DBname ='dbname='.$_ENV['DATABASE_NAME'];
        $user = $_ENV['DATABASE_USER'];
        $password = $_ENV['DATABASE_PASSWORD'];
        try
        {

            $dsn = $host.$DBname;
            $this->_bdd = new \PDO($dsn,$user,$password);
        }
        catch(\PDOException $pe)
        {
            $errorMsg = $pe->getMessage();
            echo $errorMsg;
        }        
    }

    public function getBdd() :\PDO
    {
        return $this->_bdd;
    }
}