<?php

use Core\App;
use Core\Validator;
use Modules\Auth\AuthService;

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

/** @var AuthService $authService */
$authService = App::resolveDependecy(AuthService::class);

$result = $authService->signIn($email, $password);

if (!$result) {
    $errors['email'] = 'user does not exists';

    renderView('auth/views/signIn', [
        'errors' => $errors,
    ]);
}

header('location: /');
die;
