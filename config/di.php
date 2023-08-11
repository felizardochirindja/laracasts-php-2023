<?php

use Core\Container;
use Core\Database;
use Modules\Auth\AuthService;

return function(Container $container): void {
    $container->bind(Database::class, function() use ($container): Database {
        $config = $container->resolve('settings')['database'];
        return new Database($config);
    });
    
    $container->bind(AuthService::class, function() use ($container) : AuthService {
        /** @var Database $db */
        $db = $container->resolve(Database::class);
        return new AuthService($db);
    });
};
