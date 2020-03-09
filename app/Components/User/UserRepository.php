<?php

namespace App\Components\User;

use App\Contracts\ComponentRepository;
use App\Contracts\Dto;
use App\Contracts\ToEntity;
use App\Models\User;

class UserRepository implements ComponentRepository
{
    public function store(Dto $userDto)
    {
        return User::create([
            'name' => $userDto->name,
            'email' => $userDto->email,
            'password' => $userDto->password
        ]);
    }

    public function toEntity(ToEntity $user)
    {
        return $user->toEntity();
    }
}
