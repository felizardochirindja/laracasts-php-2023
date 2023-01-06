<?php

$routes = [
    '/' => './controllers/index.php',
    '/about' => './controllers/about.php',
    '/notes' => './controllers/notes.php',
    '/note' => './controllers/note.php',
    '/contact' => './controllers/contact.php',
];

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

function abort(int $statusCode = 404)
{
    http_response_code($statusCode);
    require "./views/$statusCode.view.php";
    
    die;
}

function routeToController(string $uri, array $routes)
{
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
       abort();
    }
}

routeToController($uri, $routes);
