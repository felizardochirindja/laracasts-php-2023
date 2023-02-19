<?php

function dumpDie($value)
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

function authorize(bool $condition, $satus = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($satus);
    }
}

function basePath(string $path): string
{
    return BASE_PATH . $path;
}

function renderView(string $path, array $attributes = [])
{
    extract($attributes);
    require basePath('views/'. $path);
}
