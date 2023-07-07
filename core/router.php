<?php

namespace Core;

final class Router
{
    private array $routes = [];

    private function add($method, $uri, $controller): void
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    }

    public function get(string $uri, string $controller): void
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): void
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, string $controller): void
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller): void
    {
        $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller): void
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function route(): string
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }

    private function abort(int $statusCode = 404): never
    {
        http_response_code($statusCode);
        require basePath("/views/$statusCode.view.php");

        die;
    }
}
