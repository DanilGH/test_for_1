<?php


namespace App\Domains\User\Notification;

use App\Notifications\SendAdmin;

trait MustSendAdmin
{
    public function sendInfoForAdmin()
    {
        $this->notify(new SendAdmin);
    }
}
