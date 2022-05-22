<?php
use App\CoreClasses\DotEnv;
require(__DIR__.'/utilsFunction/BDDCreationManager.php');
require(__DIR__.'/utilsFunction/ActionBdd.php');
require('../model/BDD.php');
require('../BDD/CreationClass/createBDDMng.php');
require(__DIR__ .'/../vendor/autoload.php');
$path = '../DotENV.php';
if(file_exists($path))
{
    include($path);
    if(file_exists('../vars/.env'))
    {
        echo ' .ENV exist '.'../vars/.env';
        (new DotEnv('../vars/.env'))->load();
    }
}
else{
    echo 'not exist ';
}

$servername = $_GET['host'];
$username = $_GET['user'];
$password = $_GET['password'];

if($password === $_ENV['DATABASE_PASSWORD'])
{
    echo 'DNS =>'. $_ENV['DATABASE_DNS'];
        $host = $_ENV['DATABASE_DNS'];
        $user = $_ENV['DATABASE_USER'];
        $password = $_ENV['DATABASE_PASSWORD'];
    $currentBddCreation = new BDDCreate($host,$user, $password );

}
else{
    $currentBddCreation = new BDDCreate('localhost','root','');

}


?>