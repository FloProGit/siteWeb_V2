<?php

namespace App\CoreClasses\authentication;

class auth{

    public static function CallValidateUser($bdd,$username,$password):string|bool
    {
        if(isset($bdd))
        {
            $req = $bdd->prepare("SELECT * FROM users WHERE mail=?" );
            //$req->setFetchMode(PDO::FETCH_ASSOC);
            $req->execute(array($username));
        }
        $result = $req->fetch(\PDO::FETCH_LAZY);

        var_dump($result);
        if( $req->rowCount() === 0)
        {
            var_dump($req->rowCount());
                return 'NO USER FOUND';
        }
        else{
            if($req->rowCount() === 1)
            {
                 return self::compare($result->password ,$password);
            }
        }
    }

    private static function compare($a ,$b) : bool 
    {
        if($a === $b)
        return true;

        return false;
    }
}