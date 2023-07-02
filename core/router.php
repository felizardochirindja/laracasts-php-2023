<?php

namespace Core;

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        $this->routes[] = compact('uri', 'controller', 'method');
    }

    public function get(string $uri, string $controller)
    {
        $this->add('GET', $uri, $controller);
    }

    public function post(string $uri, string $controller)
    {
        $this->add('POST', $uri, $controller);
    }

    public function patch(string $uri, string $controller)
    {
        $this->add('PATCH', $uri, $controller);
    }

    public function put(string $uri, string $controller)
    {
        $this->add('PUT', $uri, $controller);
    }

    public function delete(string $uri, string $controller)
    {
        $this->add('DELETE', $uri, $controller);
    }

    public function route(string $uri, string $method)
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require basePath($route['controller']);
            }
        }

        $this->abort();
    }

    private function abort(int $statusCode = 404)
    {
        http_response_code($statusCode);
        require basePath("/views/$statusCode.view.php");

        die;
    }
}
