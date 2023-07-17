<?php

use Core\App;
use Core\Container;
use Core\Router;

spl_autoload_register(function (string $class) {
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class);

    require basePath($class . '.php');
});

$container = new Container();

$dependecies = require basePath('config/di.php');
$dependecies($container);

App::setContainer($container);

$router = new Router();
$routes = require basePath('routes.php');
$routes($router);

if (!$router->route()) {
    abort();
}
