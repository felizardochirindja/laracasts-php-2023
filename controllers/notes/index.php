<?php

$config = require basePath('config.php');
$db = new Database($config['database']);

$notes = $db->query('select * from notes where user_id = 6')->findAll();

renderView('notes/index.view.php', [
    'heading' => 'My notes',
    'notes' => $notes,
]);
