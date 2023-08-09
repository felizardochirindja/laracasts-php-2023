<?php

namespace Modules\Auth;

use Core\Database;

final class AuthService
{
    public function __construct(
        private Database $db
    ) {}

    public function signIn($email, $password): bool
    {
        $user = $this->db->query('select * from users where email = :email and password = :password', [
            'email' => $email, 'password' => $password
        ])->find();
        
        if (!$user) {
            return false;
        }
        
        $_SESSION['user']['email'] = $email;
        $_SESSION['user']['id'] = $user['id'];

        return true;
    }
}
