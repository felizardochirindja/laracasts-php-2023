<?php

use Core\Router;

return function(Router $router): void {
    $router->get('/sign-up', '/auth/controllers/views/signUp');
    $router->post('/store-user', 'auth/controllers/actions/storeUser');
};
