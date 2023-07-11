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

function abort(int $statusCode = 404)
{
    http_response_code($statusCode);
    require basePath("/views/$statusCode.view.php");

    die;
}

function authorize(bool $condition, int $satus = Response::FORBIDDEN): void
{
    if (!$condition) {
        abort($satus);
    }
}

function basePath(string $path): string
{
    $config = require __DIR__ . '/../config.php';
    return $config['basePath'] . $path;
}

function renderView(string $path, array $attributes = []): never
{
    extract($attributes);
    require basePath('views/' . $path);

    die;
}
