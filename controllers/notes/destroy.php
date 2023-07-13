<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id'],
])->find();

if (!$note) {
    abort();
}

authorize($note['user_id'] == $currentUserId);

$db->query('delete from notes where id = :id', [
    ':id' => $_POST['id']
]);

header('location: /notes');
exit;
