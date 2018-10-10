<?php

namespace App\Message;

class RegistrationNotification
{

    private $message;

    public function __construct($message) {
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

}