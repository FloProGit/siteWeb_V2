<?php

namespace App\CoreClasses\authentication;

class auth{

    public static function CallValidateUser(\PDO $bdd, string $username, string $password):string|bool
    {
        if(isset($bdd))
        {
            $req = $bdd->prepare("SELECT * FROM users WHERE mail=?" );
            //$req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($username));
        }
        $result = $req->fetch(\PDO::FETCH_LAZY);

        if( $req->rowCount() === 0)
        {
                return 'NO USER FOUND';
        }
        else{
            if($req->rowCount() === 1)
            {
                 return self::compare($result->password ,$password);
            }
        }
    }

    private static function compare(string $a ,string $b) : bool 
    {
        if($a === $b)
        return true;

        return false;
    }
}