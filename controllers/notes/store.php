<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database']);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'a body with no more than 1000 characters is required';
}

if (strlen($_POST['body']) > 1000) {
    $errors['body'] = 'the body cannot exceed 1000 characters';
}

if (!empty($errors)) {
    renderView('notes/create.view.php', [
        'heading' => 'Create a note',
        'errors' => $errors,
    ]);
}

$db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
    'body' => $_POST['body'],
    'user_id' => 6,
]);

header('location: /notes');
die;
