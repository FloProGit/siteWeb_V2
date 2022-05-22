<?php

namespace App;

use Directory;

class MyAutoload
{
    public static function start()
    {
        spl_autoload_register(array(__CLASS__,'autoload'));

        $root =$_SERVER['DOCUMENT_ROOT'];
        $host =$_SERVER['HTTP_HOST'];
        define('HOST',$_SERVER['REQUEST_SCHEME'].'://' . $host.'/');
        define('ROOT',$root.'/');
        define('CONTROLLER',ROOT . 'controller/');
        define('VIEW',ROOT .'pages/');
        define('MODEL',ROOT .'model/');
        define('CSS',HOST.'public/css/');
        define('IMG',ROOT.'public/img/');
        define('CLASSES',ROOT.'classes/');
        define('APP',__DIR__.'/');

    }
    public static function autoload($class)
    {
       
   
        if(strpos($class,__NAMESPACE__. '\\') === 0)
        {
            $class =str_replace(__NAMESPACE__.'\\','',$class);

            $class = str_replace('\\',DIRECTORY_SEPARATOR,$class) . '.php';
            
            if(file_exists(APP.$class))
            {
                include_once($class);
            }
            else
            {
                
            echo 'ERROR AUTOLOAD => '. $class . " (not exist)";
    
            }
        }
       
    }
}
?>