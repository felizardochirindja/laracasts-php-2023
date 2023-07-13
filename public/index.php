<?php

use Core\Router;

$config = require __DIR__ . '/../config.php';
require $config['basePath'] . 'core/functions.php';

spl_autoload_register(function (string $class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath($class . '.php');
});

require basePath('./bootstrap.php');

$router = new Router();
$routes = require basePath('routes.php');

if (!$router->route()) {
    abort();
}
