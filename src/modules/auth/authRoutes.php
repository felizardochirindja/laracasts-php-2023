<?php

use Core\Router;

return function(Router $router): void {
    $router->get('/sign-up', '/auth/controllers/views/signUp')->only('guest');
    $router->post('/sign-up', 'auth/controllers/actions/signUp')->only('guest');
    $router->post('/sign-out', 'auth/controllers/actions/signOut')->only('auth');
    $router->get('/sign-in', 'auth/controllers/views/signIn')->only('guest');
    $router->post('/sign-in', 'auth/controllers/actions/signIn')->only('guest');
};
