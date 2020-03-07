<?php


namespace App\Domains\User;

use App\Events\UserRegistered;

class UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Логика регистрации пользователя
     * @param UserEntity $userEntity
     */
    public function registration(UserEntity $userEntity)
    {
        $user = $this->userRepository->create(
            $userEntity->getEmail(),
            $userEntity->getPassword(),
            $userEntity->getName()
        );

        event(new UserRegistered($user));

        return $user;
    }
}
