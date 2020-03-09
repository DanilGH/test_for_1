<?php

namespace App\Components\User;

class UserEntity
{
    private $email;
    private $name;

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
}
