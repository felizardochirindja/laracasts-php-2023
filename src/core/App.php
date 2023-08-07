<?php

namespace Core;

class App
{
    private static Container $container;

    public static function setContainer(Container $container): void
    {
        self::$container = $container;
    }

    public static function resolveDependecy(string $key): mixed
    {
        return self::$container->resolve($key);
    }
}