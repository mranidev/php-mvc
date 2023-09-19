<?php

namespace App\Controllers;

use App\Core\Controller;

class AuthController extends Controller
{
    public function login()
    {
        $this->setLayout('auth');
        return $this->render('login');
    }

    public function register()
    {
        $this->setLayout('auth');
        return $this->render('register');
    }
}