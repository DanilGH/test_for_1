<?php


namespace App\Domains\User;

class UserRepository
{
    public function create($email, $password, $name){

        return User::create([
            'email' => $email,
            'password' => $password,
            'name' => $name
        ]);

    }
}
