<?php

namespace App\Core;

class Router
{
    public array $routes = [];
    public Request $request;
    
    public function __construct(Request $request) 
    {
        $this->request = $request;
    }
    public function get($path, $callback)
    {
        return $this->routes['get'][$path] = $callback;
    }

    public function resolve(): void
    {
        $path = $this->request->getPath();
        $method = $this->request->getMethod();

        $callback = $this->routes[$method][$path] ?? false;

        var_dump($callback);
    }
}