<?php

use Core\Router;

return function(Router $router): void {
    $router->get('/', 'pages/controllers/views/home');
    $router->get('/about', 'pages/controllers/views/about');
    $router->get('/contact', 'pages/controllers/views/contact');
};
