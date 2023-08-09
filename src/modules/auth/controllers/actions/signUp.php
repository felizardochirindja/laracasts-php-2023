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
    renderView('auth/views/signUp', [
        'errors' => $errors,
    ]);
}

/** @var Database $db */
$db = App::resolveDependecy(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    $errors['email'] = 'user already exists';

    renderView('auth/views/signUp', [
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => $password,
])->find();

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

$_SESSION['user']['email'] = $email;
$_SESSION['user']['id'] = $user['id'];

header('location: /');
die;
