<?php

use Core\Router;

return [
    ['uri' => '/home', 'controller' => 'pages/controllers/views/home', 'method' => 'GET', 'middleware' => null],
];

return function(Router $router): void {
    $router->get('/notes', 'note/controllers/views/showNotes')->only('auth');
    $router->get('/note/create', 'note/controllers/views/createNote')->only('auth');
    $router->post('/note', 'note/controllers/actions/storeNote')->only('auth');
    $router->get('/note', 'note/controllers/views/showNote')->only('auth');
    $router->delete('/note', 'note/controllers/actions/deleteNote')->only('auth');
    $router->get('/note/edit', 'note/controllers/views/editNote')->only('auth');
    $router->put('/note', 'note/controllers/actions/updateNote')->only('auth');
};
