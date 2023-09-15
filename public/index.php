<?php

require_once __DIR__ . "/../vendor/autoload.php";

use App\Core\Application;

$app = new Application(dirname(__DIR__));

$app->router->get('/', function() {
    return 'callback return!';
});

$app->router->get('/', 'home');

$app->run();