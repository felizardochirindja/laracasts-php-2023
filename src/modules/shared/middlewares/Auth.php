<?php

namespace Core\Middleware;

class Auth
{
    public function handle()
    {
        if (!$_SESSION['email'] ?? false) {
            header('location: /');
            die;
        }
    }
}
