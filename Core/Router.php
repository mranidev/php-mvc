<?php

namespace App\Core;

class Router
{
    public array $routes = [];
    public Request $request;
    public Response $response;
    
    public function __construct(Request $request, Response $response) 
    {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function resolve()
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;
        if (!$callback)
        {
            $this->response->setStatusCode(404);
            return "Not Found!";
        }
        return call_user_func($callback);
    }
}