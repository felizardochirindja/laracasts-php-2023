<?php

use Core\Container;
use Core\Router;

spl_autoload_register(function(string $fullClassName): void {
    $fullClassName = str_replace('\\', DIRECTORY_SEPARATOR, $fullClassName);
    require fileFromRoot($fullClassName);
});

$container = new Container();

$settings = require fileFromRoot('config/settings', '/');
$settings($container);

$dependecies = require fileFromRoot('config/di', '/');
$dependecies($container);

$router = new Router();
$routes = require fileFromRoot('modules/pages/routes');
$routes($router);

if (!$router->navigate()) {
    breakPage();
}
