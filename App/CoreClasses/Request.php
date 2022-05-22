<?php
namespace App\CoreClasses;

class Request
{


    public function __construct()
    {
    }


    public function getPath() :string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path,'?');
        if($position === false)
        {
            return $path;
        }
    }

    public function getMethode()
    {
         return strtolower($_SERVER['REQUEST_METHOD']);
    }


    public function getBody()
    {

        
    }
}