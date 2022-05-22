<?php

use App\MyAutoload;
require '../app/Autoloader.php';
use App\CoreClasses\DotEnv;
use App\CoreClasses\Application;
use App\Classes\controller\Home;
use App\Classes\controller\Login;

MyAutoload::start();

// if(isset($_GET['r']))
// {
//     $request = $_GET['r'];
// }
// else{
//     $request = 'home';
// }
(new DotEnv('../vars/.env'))->load();
$app = new Application();

$app->router->get('/',[Home::class,'showHome']);
$app->router->get('/home',[Home::class,'showHome']);
$app->router->get('/a_propos',[Home::class,'showA_Propos']);
$app->router->get('/competence',[Home::class,'showCompetence']);
$app->router->get('/login',[Login::class,'loginIn']);
$app->router->post('/login',[Login::class,'loginIn']);
$app->run();



// echo"index";
// $router = new Router($request);
// $router->renderController();