<?php

use Core\App;
use Core\Database;

$db = App::resolveDependecy(Database::class);

$notes = $db->query('select * from notes where user_id = 6')->findAll();

renderView('note/views/showNotes', [
    'heading' => 'My notes',
    'notes' => $notes,
]);
