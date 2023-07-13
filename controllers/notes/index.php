<?php

use Core\App;
use Core\Database;

$db = App::getContainer()->resolve(Database::class);

$notes = $db->query('select * from notes where user_id = 6')->findAll();

renderView('notes/index.view.php', [
    'heading' => 'My notes',
    'notes' => $notes,
]);
