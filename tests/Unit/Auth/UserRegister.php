<?php

namespace Tests\Unit;

use App\Domains\User\UserEntity;
use PHPUnit\Framework\TestCase;

class UserRegister extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $name = 'Rest';
        $email = 'rest@test.test';
        $pass = 'new_pass';

        $userEntity = new UserEntity();
        $userEntity
            ->setEmail($email)
            ->setName($name)
            ->setPassword($pass);

        $this->assertNotEquals($pass, $userEntity->getPassword());
    }
}
