<?php

namespace Core;

use Core\Middleware\Middleware;

final class Router
{
    private array $routes = [];

    public function get(string $uri, string $controller): self
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller): self
    {
        return $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, string $controller): self
    {
        return $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller): self
    {
        return $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller): self
    {
        return $this->add('DELETE', $uri, $controller);
    }

    private function add($method, $uri, $controller): self
    {
        $middleware = null;
        $this->routes[] = compact('uri', 'controller', 'method', 'middleware');
        return $this;
    }

    public function only($key): void
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
    }

    public function route(): bool
    {
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {

                if ($route['middleware']) {
                    Middleware::resolve($route['middleware']);
                }

                require basePath($route['controller']);

                return true;
            }
        }

        return false;
    }
}
