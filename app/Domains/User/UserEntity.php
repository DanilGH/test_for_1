<?php


namespace App\Domains\User;

use Illuminate\Support\Facades\Hash;

class UserEntity
{
    private $email;
    private $name;
    private $password;

    public function setEmail(string $email): UserEntity
    {
        $this->email = $email;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): UserEntity
    {
        $this->name = $name;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword(string $password): UserEntity
    {
        $this->password = Hash::make($password);
        return $this;
    }
}
