<?php

use Symfony\Component\Yaml\Yaml;

class BDDCreationManager
{
    private $arrayAction =[];

    public function __construct(string $yamlPath,\PDO $conn)
    {

    
       $yamlArray = Yaml::parseFile($yamlPath);
        foreach ($yamlArray as $key => $Action)  {
            
            array_push($this->arrayAction, $this->CreateObjectsAction($key,$Action));
        }

        foreach ($this->arrayAction as $string)  
        {

            $sql = $string->getFinalString();
            $quit = false;
            while(!$quit)
            {

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
    public function CreateObjectsAction(string $keyAction, Array $Action) : ActionBDD
    {
          return new ActionBDD($keyAction,$Action);
    }

    public function showArrayAction() 
    {
    }
}