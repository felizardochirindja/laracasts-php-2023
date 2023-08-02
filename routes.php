<?php

use Core\Router;

return function(Router $router) {
    $router->get('/', 'controllers/index.php');
    $router->get('/about', 'controllers/about.php');
    $router->get('/contact', 'controllers/contact.php');
    
    $router->get('/notes', 'controllers/notes/index.php')->only('auth');
    $router->get('/note/create', 'controllers/notes/create.php')->only('auth');
    $router->get('/note/edit', 'controllers/notes/edit.php')->only('auth');
    $router->put('/note/update', 'controllers/notes/update.php');
    $router->get('/note', 'controllers/notes/show.php')->only('auth');
    $router->delete('/note', 'controllers/notes/destroy.php')->only('auth');
    $router->post('/notes', 'controllers/notes/store.php')->only('auth');
    
    $router->get('/register', 'controllers/registration/create.php');
    $router->post('/register', 'controllers/registration/store.php');
};
