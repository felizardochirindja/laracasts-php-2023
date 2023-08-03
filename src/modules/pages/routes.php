<?php

use Core\Router;

return function(Router $router) {
    $router->get('/', 'pages/controllers/home');
    $router->get('/about', 'pages/controllers/about');
    $router->get('/contact', 'pages/controllers/contact');
};
