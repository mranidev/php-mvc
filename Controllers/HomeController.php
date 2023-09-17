<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $vars = [
            'title' => 'awesome MVC'
        ];

        return $this->render('home', $vars);
    }
}