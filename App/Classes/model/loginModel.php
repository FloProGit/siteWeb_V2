<?php
namespace App\Classes\model;
use App\CoreClasses\authentication\auth;

class loginModel extends BaseManager
{
   private $_username;
   private $_password;
    
    public function __construct($username,$password)
    {
        parent::__construct("user","User");
        $this->_username = $username;
        $this->_password = $password;
        
    }

    public function validateUser():string|bool
    {
        return auth::CallValidateUser($this->_bdd,$this->_username,$this->_password);
    }

  

    public function getUserName()
    {
        return $this->_username;
    }
    public function getPassword()
    {
        return $this->_password;
    }
}