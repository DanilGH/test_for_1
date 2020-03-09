<?php

namespace App\Components\User;

use App\Contracts\Dto;

class UserDto implements Dto
{
    public $name;
    public $email;
    public $password;
}
