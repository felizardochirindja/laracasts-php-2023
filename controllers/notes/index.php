<?php

use Core\App;
use Core\Database;

// $config = require basePath('config.php');
// $db = new Database($config['database']);

$db = App::getContainer()->resolve(Database::class);
// dumpDie($db);

$notes = $db->query('select * from notes where user_id = 6')->findAll();

renderView('notes/index.view.php', [
    'heading' => 'My notes',
    'notes' => $notes,
]);
