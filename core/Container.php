<?php

namespace Core;

use Exception;

final class Container
{
    private $bindings = [];

    public function bind(string $key, $resolver)
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve(string $key)
    {        
        if (!array_key_exists($key, $this->bindings)) {
            throw new Exception("no matching binding for {$key}");
        }

        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
    }
}
