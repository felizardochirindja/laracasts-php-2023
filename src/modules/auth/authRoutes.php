<?php

use Core\Router;

return function(Router $router): void {
    $router->get('/sign-up', '/auth/controllers/views/signUp');
    $router->post('/sign-up', 'auth/controllers/actions/signUp');
    $router->post('/sign-out', 'auth/controllers/actions/signOut');
    $router->get('/sign-in', 'auth/controllers/views/signIn');
    $router->post('/sign-in', 'auth/controllers/actions/signIn');
};
