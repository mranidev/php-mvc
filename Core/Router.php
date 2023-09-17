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

        if (is_array($callback))
        {
            Application::$app->controller = new $callback[0]();
            $callback[0] = Application::$app->controller;
        }
        
        return call_user_func($callback);
    }

    public function renderView($view, $vars = [])
    {
        foreach($vars as $var => $val)
        {
            $$var = $val;
        }

        ob_start();
        require_once Application::$dir . "/views/$view.php";
        return ob_get_clean();
    }

    public function renderLayout()
    {
        $layout = Application::$app->controller->layout;
        ob_start();
        require_once Application::$dir . "/views/layouts/$layout.php";
        return ob_get_clean();
    }

    public function renderContent($view, $vars = []): string
    {
        $layoutContent = $this->renderLayout();
        $viewContent = $this->renderView($view, $vars);

        return str_replace('{content}', $viewContent, $layoutContent);
    }
}