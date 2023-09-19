<?php

namespace App\Controllers;

use App\Core\Request;
use App\Core\Controller;
use App\Models\RegisterModel;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $this->setLayout('auth');
        
        return $this->render('login');
    }

    public function register(Request $request)
    {
        if ($request->isPost())
        {
            $data = $request->getBody();
            $registerModel = new RegisterModel();
            $registerModel->save($data);
            $this->setLayout('auth');
            $vars = [
                "message" => 'successful registration'
            ];
            return $this->render('register', $vars ?? '');
        }

        $this->setLayout('auth');
        return $this->render('register');
    }
}