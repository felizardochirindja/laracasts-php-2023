<?php

$heading = 'Create a note';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    dumpDie($_POST);
}

require './views/note-create.view.php';
