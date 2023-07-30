<?php

use Core\App;
use Core\Container;
use Core\Router;

spl_autoload_register(function (string $className): void {
    $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);

    require basePath($className . '.php');
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
