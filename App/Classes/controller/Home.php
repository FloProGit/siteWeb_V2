<?php
namespace App\Classes\controller;
use App\CoreClasses\View;

class Home
{
    public function showHome()
    {
        $myView = new View('home');
        $myView->render(['style'=>'home']);
    }

    public function showCompetence()
    {
        $myView = new View('competence');
        $myView->render(['style'=>'competence']);
    }

    public function showA_Propos()
    {
        $myView = new View('a_propos');
        $myView->render(['style'=>'a_propos']);
    }
    public function showCheck()
    {
        //echo "tata";
        $myView = new View('CheckVar');
        $myView->render(['style'=>'CheckVar']);
    }
    public function showCreateBDD()
    {
        //echo "tata";
        $myView = new View('CreateBDDPage');
        $myView->render(['style'=>'CreateBDDPage']);
    }
  
}