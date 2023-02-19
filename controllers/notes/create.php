<?php

$config = require basePath('config.php');
$db = new Database($config['database']);

$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!Validator::string($_POST['body'], 1, 1000)) {
        $errors['body'] = 'a body with no more than 1000 characters is required';
    }

    if (strlen($_POST['body']) > 1000) {
        $errors['body'] = 'the body cannot exceed 1000 characters';
    }

    if(empty($errors)) {
        $db->query('INSERT INTO notes(body, user_id) VALUES(:body, :user_id)', [
            'body' => $_POST['body'],
            'user_id' => 6,
        ]);
    }
}

renderView('notes/create.view.php', [
    'heading' => 'Create a note',
    'errors' => $errors,
]);
