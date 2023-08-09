<?php

$heading = $_SESSION['user'] ?? false ? "Hello " . $_SESSION['user']['email'] : 'Welcome';

renderView('pages/views/home', [
    'heading' => $heading,
]);
