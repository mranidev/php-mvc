<?php

namespace App\Core;

class Controller
{
    public $layout = 'app';
    
    public function setLayout($layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $vars = [])
    {
        return Application::$app->router->renderContent($view, $vars);
    }
}