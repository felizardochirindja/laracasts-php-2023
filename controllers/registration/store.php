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
    renderView('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

/** @var Database $db */
$db = App::getContainer()->resolve(Database::class);

$user = $db->query('select * from users where email = :email', [
    'email' => $email,
])->find();

if ($user) {
    $errors['userExists'] = 'user already exists';

    renderView('registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO users(email, password) VALUES(:email, :password)', [
    'email' => $email,
    'password' => $password,
]);

$_SESSION['email'] = $email;

header('location: /');
