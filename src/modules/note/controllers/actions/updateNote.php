<?php

use Core\App;
use Core\Database;
use Core\HTTPResponse;
use Core\Validator;

$db = App::resolveDependecy(Database::class);

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id'],
])->find();

if (!$note) {
    breakPage();
}

$currentUserId = $_SESSION['user']['id'] ?? false;

if ($note['user_id'] !== $currentUserId) {
    breakPage(HTTPResponse::Forbiden);
}

if (!Validator::string($_POST['body'], 1, 5)) {
    $errors['body'] = 'a body with no more than 5 characters is required';
}

if (!empty($errors)) {
    renderView('notes/views/editNote', [
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
