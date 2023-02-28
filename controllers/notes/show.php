<?php

use Core\Database;

$config = require basePath('config.php');
$db = new Database($config['database']);

$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

renderView('notes/show.view.php', [
    'heading' => 'Note',
    'note' => $note,
]);
