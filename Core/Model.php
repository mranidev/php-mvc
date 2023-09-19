<?php

namespace App\Core;

class Model
{
    public function save($data)
    {
        foreach($data as $key => $value)
        {
            $this->{$key} = $value;
        }
    }
}