<?php

namespace App\Models;

use App\Components\User\UserEntity;
use App\Contracts\ToEntity;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property mixed email
 * @property mixed name
 * @method static create(array $array)
 * @method static make(array $array)
 * @method static where(string $string, $env)
 */
class User extends Authenticatable implements ToEntity
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function toEntity()
    {
        $userEntity = new UserEntity();
        $userEntity->setName($this->name);
        $userEntity->setEmail($this->email);

        return $userEntity;
    }
}
