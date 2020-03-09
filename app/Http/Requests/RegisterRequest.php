<?php

namespace App\Http\Requests;

use App\Components\User\UserDto;
use App\Contracts\ToDto;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest implements ToDto
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }

    public function toDto()
    {
        $userDto = new UserDto();
        $userDto->name = $this->get('name', '');
        $userDto->email = $this->get('email', '');
        $userDto->password = $this->get('password', '');

        return $userDto;
    }
}
