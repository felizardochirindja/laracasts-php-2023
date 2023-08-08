<?php

use Core\App;
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

App::setContainer($container);

$router = new Router();

// page routes
$routes = require fileFromRoot('modules/pages/routes');
$routes($router);

// note routes
$routes = require fileFromRoot('modules/note/noteRoutes');
$routes($router);

// auth routes
$routes = require fileFromRoot('modules/auth/authRoutes');
$routes($router);

if (!$router->navigate()) {
    breakPage();
}
