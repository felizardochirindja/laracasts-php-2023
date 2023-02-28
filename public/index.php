<?php

const BASE_PATH = __DIR__ . '/..//';

require BASE_PATH . 'core/functions.php';

spl_autoload_register(function (string $class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath($class . '.php');
});

require basePath('core/router.php');
