<?php

$heading = $_SESSION['email'] ?? false ? "Hello " . $_SESSION['email'] : 'Welcome';

renderView('index.view.php', [
    'heading' => $heading,
]);
