<?php

use Symfony\Component\Yaml\Yaml;

class BDDCreationManager
{
    private $arrayAction =[];

    public function __construct($yamlPath,$conn)
    {

    
       $yamlArray = Yaml::parseFile($yamlPath);
        foreach ($yamlArray as $key => $Action)  {
            
            array_push($this->arrayAction, $this->CreateObjectsAction($key,$Action));
        }

        foreach ($this->arrayAction as $string)  
        {

            $sql = $string->getFinalString();
            $quit = false;
            echo 'SQL =>' .$sql;
            while(!$quit)
            {
            var_dump($sql);

                    if( $conn->query($sql) === TRUE)
                    {
                        $quit = true;
                    }
                    else
                    {
                        sleep(2);
                        $quit = true;
                    }
            }
        }
    }
    public function CreateObjectsAction($keyAction,$Action) : ActionBDD
    {
          return new ActionBDD($keyAction,$Action);
    }

    public function showArrayAction() 
    {
         var_dump($this->arrayAction);
    }
}