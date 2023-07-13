<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::getContainer()->resolve(Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 5)) {
    $errors['body'] = 'a body with no more than 5 characters is required';
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
