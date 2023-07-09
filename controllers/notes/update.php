<?php

use Core\Database;
use Core\Validator;

$config = require basePath('config.php');
$db = new Database($config['database']);

$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id'],
])->find();

if (!$note) {
    abort();
}

authorize($note['user_id'] == $currentUserId);

if (!Validator::string($_POST['body'], 1, 5)) {
    $errors['body'] = 'a body with no more than 5 characters is required';
}

if (!empty($errors)) {
    renderView('notes/edit.view.php', [
        'heading' => 'Create a note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    'id' => $_GET['id'],
    'body' => $_POST['body'],
]);

header("location: /notes");
die;
