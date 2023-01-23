<?php

require './Database.php';

$config = require './config.php';
$db = new Database($config['database']);

$heading = 'Note';
$currentUserId = 6;

$note = $db->query('select * from notes where id = :id', [
    ':id' => $_GET['id'],
])->findOrFail();

authorize($note['user_id'] == $currentUserId);

require './views/note.view.php';
