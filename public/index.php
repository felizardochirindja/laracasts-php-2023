<?php

session_start();

$config = require __DIR__ . '/../env.php';
require $config['basePath'] . 'core/functions.php';
require basePath('./bootstrap.php');
