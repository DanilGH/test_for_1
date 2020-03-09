<?php

namespace App\Listeners;

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
        Notification::send($admin, new SendAdmin($event->user));
    }
}
