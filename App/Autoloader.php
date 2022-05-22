<?php

namespace App;

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
    }
    public static function autoload($class)
    {

        if(strpos($class,__NAMESPACE__. '\\') === 0)
        {
            $class =str_replace(__NAMESPACE__.'\\','',$class);

            $class =str_replace('\\','/',$class) . '.php';

            if(file_exists('../App/'.$class))
            {
                include_once($class);
                // echo 'NONE AUTOLOAD => '.$class.'.php';
            }
            else
            {
                
            echo 'ERROR AUTOLOAD => '. $class . " (not exist)";
    
            }
        }
       
    }
}
?>