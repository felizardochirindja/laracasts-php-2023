<?php

use Core\App;
use Core\Database;
use Core\HTTPResponse;

$db = App::resolveDependecy(Database::class);

$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_POST['id'],
])->find();

if (!$note) {
    breakPage();
}

if ($note['user_id'] !== $currentUserId) {
    breakPage(HTTPResponse::Forbiden);
}

$db->query('delete from notes where id = :id', [
    ':id' => $_POST['id']
]);

header('location: /notes');
exit;
