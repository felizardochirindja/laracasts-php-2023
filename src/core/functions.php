<?php

use Core\HTTPResponse;

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

function breakPage(HTTPResponse $statusCode = HTTPResponse::NotFound): never
{
    http_response_code($statusCode->value);
    require fileFromRoot("modules/shared/views/error/{$statusCode->value}.view");
    die;
}

function fileFromRoot(string $path, $root = 'src'): string
{
    $config = require __DIR__ . '/../../env.php';
    return $config['rootPath'] . "/{$root}//" . $path . '.php';
}

function renderView(string $path, array $attributes = []): never
{
    extract($attributes);
    require fileFromRoot('modules/' . $path);
    die;
}
