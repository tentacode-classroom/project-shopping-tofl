<?php

namespace App\MessageHandler;

use App\Message\RegistrationNotification;

class RegistrationNotificationHandler
{

    public function __invoke(RegistrationNotification $notification)
    {
        dd($notification->getMessage());
    }

}