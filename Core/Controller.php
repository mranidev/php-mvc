<?php

namespace App\Core;

class Controller
{
    public function render($view)
    {
        return Application::$app->router->renderContent($view);
    }
}