<?php

use Core\Response;

function dumpDie($value): never
{
    echo '<pre>';
    var_dump($value);
    echo '<pre>';

    die;
}

function requestUrlIs(string $value): bool
{
    return $_SERVER['REQUEST_URI'] === $value;
}

function abort(Response $statusCode = Response::NotFound)
{
    http_response_code($statusCode->value);
    require basePath("/views/{$statusCode->value}.view.php");

    die;
}

function authorize(bool $condition, Response $status = Response::Forbiden): void
{
    if (!$condition) {
        abort($status);
    }
}

function basePath(string $path): string
{
    $config = require __DIR__ . '/../env.php';
    return $config['basePath'] . $path;
}

function renderView(string $path, array $attributes = []): never
{
    extract($attributes);
    require basePath('views/' . $path);

    die;
}
