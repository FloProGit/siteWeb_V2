<?php
class BDDCreate{


    private $servername ;
    private $username; 
    private $password ;

    public function __construct($servername,$username,$password)
    {
        
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;

       
        $conn = new PDO($servername, $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $path = './StructureBdd/CreateTable.yaml';
      
        if(file_exists( $path ))
        {
            $BDDCreation = new  BDDCreationManager($path,$conn);
            
        }
        else{
        echo 'Bad Path !!';
        }
       // $conn = null;
    }
    

}