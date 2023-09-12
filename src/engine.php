<?php

spl_autoload_register(function(string $fullClassName): void {
    $fullClassName = str_replace('\\', DIRECTORY_SEPARATOR, $fullClassName);
    require fileFromRoot($fullClassName);
});
    
$routes = [];

// pages routes
$routes[] = require fileFromRoot('modules/pages/routes');

// note routes
$routes[] = require fileFromRoot('modules/note/noteRoutes');

// auth routes

// $routes = $route
$routeFound = require fileFromRoot('core/router');

if (!$routeFound) {
    breakPage();
}
