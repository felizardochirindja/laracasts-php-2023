<?php

session_start();

$config = require __DIR__ . '/../env.php';
require $config['rootPath'] . '/src/core/functions.php';
require fileFromRoot('engine');
