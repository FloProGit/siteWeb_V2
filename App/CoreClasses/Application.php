<?php


namespace App\CoreClasses;


class Application
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static Application $app;

    public function __construct()
    {
        $this->request = new Request();
        self::$app = $this;
        $this->response = new Response();
        $this->router = new Router($this->request,$this->response);
    }

    public function run()
    {
        $this->router->resolve();
    }
}