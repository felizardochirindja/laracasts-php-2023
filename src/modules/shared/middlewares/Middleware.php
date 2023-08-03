<?php

namespace Core\Middleware;

use Exception;

class Middleware
{
    const MAP = [
        'auth' => Auth::class
    ];

    public static function resolve($key)
    {
        $middleware = static::MAP[$key] ?? false;

        if (!$middleware) {
            throw new Exception("no matching middleware with a key of " . $key);
        }

        $middleware = Middleware::MAP[$key];
        (new $middleware)->handle();
    }
}
