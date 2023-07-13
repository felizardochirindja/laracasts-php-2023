<?php

use Core\Router;

/** @var Router $router */
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/notes', 'controllers/notes/index.php');
$router->get('/note/create', 'controllers/notes/create.php');
$router->get('/note/edit', 'controllers/notes/edit.php');
$router->put('/note/update', 'controllers/notes/update.php');
$router->get('/note', 'controllers/notes/show.php');
$router->delete('/note', 'controllers/notes/destroy.php');
$router->post('/notes', 'controllers/notes/store.php');

$router->get('/register', 'controllers/registration/create.php');
