<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
    $errors['email'] = 'provide a valid email';
}

if (!Validator::string($password, 7, 255)) {
    $errors['password'] = 'provide a password of at least 7 chars';
}

if (!empty($errors)) {
    renderView('auth/views/signIn', [
        'errors' => $errors,
    ]);
}

/** @var Database $db */
$db = App::resolveDependecy(Database::class);

$user = $db->query('select * from users where email = :email and password = :password', [
    'email' => $email, 'password' => $password
])->find();

if (!$user) {
    $errors['email'] = 'user does not exists';

    renderView('auth/views/signIn', [
        'errors' => $errors,
    ]);
}

$_SESSION['email'] = $email;

header('location: /');
