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

    public function get(string $path,mixed $callback)
    {
        
        $this->routes['get'][$path] = $callback;
    }
    public function post(string $path,mixed $callback)
    {
        
        $this->routes['post'][$path] = $callback;
    }

    public function resolve():mixed
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




