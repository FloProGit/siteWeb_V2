<?php
namespace App\Classes\controller;
use App\CoreClasses\View;
use App\Classes\model\loginModel;
use  App\CoreClasses\sessions\SessionMng;
class Login 
{
    private const METHOD_GET = 'GET';
    private const LOGIN_VIEW_NAME = 'login_view';
    private $ModeLogin;

    public function loginIn() : void 
    {
        if($_SERVER['REQUEST_METHOD'] === self::METHOD_GET)
        {
            $myView = new View(self::LOGIN_VIEW_NAME);
             $myView->render(['data'=>'','style'=>'login']);
            return ;
        }
        $username= $_POST['username'];
        $password= $_POST['password'];
        $this->ModeLogin = new loginModel($username,$password);
        $datafetch = $this->ModeLogin->validateUser();
        var_dump(   $datafetch );
        if($datafetch === 'NO USER FOUND')
        {
            $myView = new View(self::LOGIN_VIEW_NAME);
            $myView->render(['data'=>'mail ou mot de passe incorect !']);
            return;
        }
        else if($datafetch === true)
        {
            $redirection =HOST.'home';
            SessionMng::init_php_session();
            SessionMng::addSessionData(['login'=>'on','test'=>'TU EST LOGER']);
            echo $redirection;
            echo "VALIDATE";
             header('Location: '.$redirection);
             exit();
        }
        else if($datafetch === false)
        {
            echo 'NO USER FOUND';
            $myView = new View(self::LOGIN_VIEW_NAME);
             $myView->render(['data'=>'mail ou mot de passe incorect !']);
            return;
        }
      
        // header('Location: '.$redirection);
        // exit();
         //$myView = new View(self::LOGIN_VIEW_NAME);
         //return $myView->render();
    }
    
     
}