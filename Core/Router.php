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

        if (is_string($callback))
        {
            return $this->renderContent($callback);
        }
        
        return call_user_func($callback);
    }

    public function renderView($view)
    {
        ob_start();
        require_once __DIR__ . "/../views/$view.php";
        return ob_get_clean();
    }

    public function renderLayout()
    {
        ob_start();
        require_once __DIR__ . "/../views/layouts/app.php";
        return ob_get_clean();
    }

    public function renderContent($view): string
    {
        $layoutContent = $this->renderLayout();
        $viewContent = $this->renderView($view);

        return str_replace('{content}', $viewContent, $layoutContent);
    }
}