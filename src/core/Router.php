<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$flattenedRoutes = [];

foreach ($routes as $routeArray) {
    $flattenedRoutes = array_merge($flattenedRoutes, $routeArray);
}

foreach ($flattenedRoutes as $route) {
    if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
        require fileFromRoot('modules/' . $route['controller'] . '.controller');
        return true;
    }
}

return false;
