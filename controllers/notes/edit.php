<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id'],
])->find();

if (!$note) {
    abort();
}

authorize($note['user_id'] == $currentUserId);

renderView('notes/edit.view.php', [
    'heading' => 'edit note',
    'errors' => [],
    'note' => $note,
]);
