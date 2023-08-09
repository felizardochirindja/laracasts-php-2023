<?php

use Core\App;
use Core\Database;
use Core\HTTPResponse;

$db = App::resolveDependecy(Database::class);

if (!isset($_GET['id'])) {
    breakPage();
}

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

renderView('note/views/showNote', [
    'heading' => 'Note',
    'note' => $note,
]);
