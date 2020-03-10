<?php

namespace App\Listeners;

use App\Components\User\UserDto;
use App\Components\User\UserService;
use App\Models\User;
use App\Notifications\SendAdmin;
use Illuminate\Support\Facades\Notification;

class SendAdminNewRegister
{
    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $admin = User::where('email', env('ADMIN_EMAIL'))->first();

        if (!$admin) {
            /** @var UserService $userService */
            $userService = app(UserService::class);
            $userDto = new UserDto();
            $userDto->name = 'admin';
            $userDto->email = env('ADMIN_EMAIL');
            $userDto->password = 'password';
            $admin = $userService->register($userDto);
        }

        Notification::send($admin, new SendAdmin($event->user));
    }
}
