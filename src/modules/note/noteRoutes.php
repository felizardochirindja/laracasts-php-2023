<?php

use Core\Router;

return function(Router $router): void {
    $router->get('/notes', 'note/controllers/views/showNotes');
    $router->get('/note/create', 'note/controllers/views/createNote');
    $router->post('/note', 'note/controllers/actions/storeNote');
    $router->get('/note', 'note/controllers/views/showNote');
    $router->delete('/note', 'note/controllers/actions/deleteNote');
    $router->get('/note/edit', 'note/controllers/views/editNote');
    $router->put('/note', 'note/controllers/actions/updateNote');
};
