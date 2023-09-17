<?php

namespace App\Core;

class Controller
{
    public function render($view, $vars = [])
    {
        return Application::$app->router->renderContent($view, $vars);
    }
}