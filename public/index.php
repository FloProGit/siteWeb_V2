<?php

require '../App/Autoloader.php';
use App\MyAutoload;
use App\CoreClasses\DotEnv;
use App\CoreClasses\Application;
use App\Classes\controller\Home;
use App\Classes\controller\Login;

MyAutoload::start();

(new DotEnv('../vars/.env'))->load();
$app = new Application();

$app->router->get('/',[Home::class,'showHome']);
$app->router->get('/home',[Home::class,'showHome']);
$app->router->get('/a_propos',[Home::class,'showA_Propos']);
$app->router->get('/competence',[Home::class,'showCompetence']);
$app->router->get('/login',[Login::class,'loginIn']);
$app->router->post('/login',[Login::class,'loginIn']);

$app->run();




