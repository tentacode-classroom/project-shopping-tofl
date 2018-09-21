<?php

namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;

class ChatonController {

    public function helloWorld() {
        return new Response(
            'Hello world !'
        );
    }

}