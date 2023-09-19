<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Application;
use App\Controllers\AuthController;
use App\Controllers\HomeController;

$app = new Application(dirname(__DIR__));

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/register', [AuthController::class, 'register']);
$app->router->get('/login', [AuthController::class, 'login']);

$app->run();