<?php

namespace App\CoreClasses;

class Router
{
    protected array $routes =[];
    public Request $request;
    public Response $response;
    
    public function __construct(Request $request,Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function get($path,$callback)
    {
        
        $this->routes['get'][$path] = $callback;
    }
    public function post($path,$callback)
    {
        
        $this->routes['post'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethode();

        $callback = $this->routes[$method][$path] ?? false;
        if($callback === false)
        {
                $this->response->setStatusCode(404);
            echo '<pre>';
            var_dump($_SERVER);
            echo '</pre>';

            echo'NOT FOUND';
            exit;
        }
        if(is_string($callback))
        {
            $this->renderView($callback);
        }
        if(is_array($callback))
        {
            $callback[0] = new $callback[0]();
        }
       return call_user_func($callback);
 
    }

    public function renderView()
    {
        include_once('../App/Classes/controller/'.$callback.'.php');
        $controller = new $callback();
        $controller->showHome();

    }

}




// class Router
// {
//     private $request;
    

//     private $routes =[

//         'home'=>['controller' => 'home', 'method'=>'showHome'],

//         'competence'=>['controller' => 'home', 'method'=>'showCompetence'],

//         'a_propos'=>['controller' => 'home', 'method'=>'showA_Propos'],

//         'login'=>['controller' => 'login', 'method'=>'loginIn'],

//         // -----use only for check some  variable -----
//         'check'=>['controller' => 'home', 'method'=>'showCheck'],
//         //------------------------------
//         // -----use only for check some  variable -----
//         'BDDcreatorpage'=>['controller' => 'home', 'method'=>'showCreateBDD'],
//         //------------------------------



//         ];

//     public function __construct($request)
//     {

//         $this->request = $request;    

//     }


//     public function renderController()
//     {
//         $request = $this->request;
//         if(key_exists($request, $this->routes))
//         {
//             $controller = $this->routes[$request]['controller'];
          
//             $method = $this->routes[$request]['method'];
            
//             $currentController = new $controller();

//             $currentController->$method();
//         }
//         else
//         {
//             echo '404';
//         }
//     }
// }