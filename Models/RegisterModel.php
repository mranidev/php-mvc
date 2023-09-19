<?php

namespace App\Models;

use App\Core\Model;

class RegisterModel extends Model
{
    public string $name;
    public string $username;
    public string $email;
    public string $password;
}