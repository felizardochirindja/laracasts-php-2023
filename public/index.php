<?php

const BASE_PATH = __DIR__ . '/..//';

require BASE_PATH . './functions.php';

spl_autoload_register(function (string $class) {
    require basePath('core/'. $class . '.php');
});

require basePath('router.php');
