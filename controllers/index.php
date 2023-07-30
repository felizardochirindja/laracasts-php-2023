<?php

$heading = $_SESSION['email'] ? "Hello " . $_SESSION['email'] : 'Welcome';

renderView('index.view.php', [
    'heading' => $heading,
]);
