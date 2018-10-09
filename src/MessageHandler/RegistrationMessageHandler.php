<?php

namespace App\MessageHandler;

use App\Message\RegistrationNotification;

class RegistrationMessageHandler
{

    public function __invoke(RegistrationNotification $notification) {
        dump($notification->getMessage());
    }

}