<?php

namespace App\Components\User;

use App\Contracts\ComponentService;
use App\Contracts\Dto;
use App\Events\NewUserRegistered;

class UserService implements ComponentService
{
    /**
     * @var UserRepository
     */
    private $repository;

    /**
     * UserService constructor.
     * @param UserRepository $repository
     */
    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function register(Dto $userDto)
    {
        $user = $this->repository->store($userDto);

        event(new NewUserRegistered($user));

        return $user;
    }
}
