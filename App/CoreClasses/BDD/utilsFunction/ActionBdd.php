<?php



class ActionBDD
{
    
    private $finalString;

    public function __construct($keyAction,$Array)
    {

        $this->finalString = $this->DetectAction($keyAction,$Array);
    }

    public function getFinalString():string
    {
        return $this->finalString;
    }

    private function DetectAction($keyAction,$action) : string
    {
        $string = '';
        if($keyAction === 'CreateBDD')
        {
            $string = 'CREATE DATABASE ' . $action['name'];
        }
        if($keyAction === 'CreateTable')
        {
            if($action['DBTarget'] ==='%env(DATABASE_NAME)%')
            {
                $action['DBTarget'] = $_ENV['DATABASE_NAME'];
            }
            $string = 'CREATE TABLE '.$action['DBTarget'].'.' . $action['name'] .'(';
            
            $first = true;

            foreach ($action['column'] as $column)  
            {
             if($first)
             $first = false;
             else
             $string .=' , ';
                $string .= $this->createlinefromdataArray($column);
                
            }
            $string .=');';
           

        }
       
        return $string;
    }

    private function createlinefromdataArray($array):string
    {
        $useValue = false;
        $string = ''; 
        if(array_key_exists('name', $array))
            $string .= $array['name'] .' ';
       
        if(array_key_exists('type', $array))
        {  
            if($array['type'] === 'VARCHAR')
            {
                $string .= 'VARCHAR(' .$array['value'].') ';
            }
           else{
            $string .= $array['type'].' ';
            $useValue = true;
           }
        }

        if($useValue && array_key_exists('value', $array))
            $string .= $array['value'] .' ';

        if(array_key_exists('default', $array))
        $string .= 'DEFAULT '. $array['default'].' ';

        if(array_key_exists('collation', $array))
        $string .= $array['collation'];

        if(array_key_exists('attributes', $array))
        $string .= $array['attributes'];

        if(array_key_exists('_null', $array))
        $string .= ($array['_null'] ?'NULL':'NOT NULL').' ';
        
        
        if(array_key_exists('A_I', $array))
        $string .= $array['A_I']?'AUTO_INCREMENT ':'';
        
        if(array_key_exists('index', $array))
        $string .= $array['index'].' ';
      

        if(array_key_exists('comments', $array))
        $string .= $array['comments'];

        // if(array_key_exists('virtuality', $array))
        // if(array_key_exists('move_column', $array))
        // if(array_key_exists('media_type', $array))
        // if(array_key_exists('browser_display_transformation', $array))
        // if(array_key_exists('browser_display_transformation_options', $array))
        // if(array_key_exists('Input_transformation', $array))
        // if(array_key_exists('input_transformation_options', $array))
      

        return $string;
    }
}