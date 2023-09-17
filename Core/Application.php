<?php

namespace App\Core;

class Application 
{
    public Router $router;
    public Request $request;
    public Response $response;
    public static string $dir;
    public static Application $app;
    public Controller $controller;

    public function __construct($dir)
    {
        $this->controller = new Controller();
        self::$app = $this;
        self::$dir = $dir;
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router($this->request, $this->response);
        
    }
    
    public function run() 
    {
        print $this->router->resolve();
    }
}