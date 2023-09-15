<?php

namespace App\Core;

class Request
{
    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'];
        $query = strpos($path, '?');

        if (!$query)
        {
            return $path;
        }

        return substr($path, 0, $query);
    } 

    public function getMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}