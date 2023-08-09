<?php

use Core\Container;
use Core\Database;

return function(Container $container): void {
    $container->bind(Database::class, function() use ($container): Database {
        $config = $container->resolve('settings')['database'];
        return new Database($config);
    });
};
