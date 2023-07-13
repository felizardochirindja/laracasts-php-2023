<?php

use Core\Container;
use Core\Database;

return function(Container $container): void
{
    $container->bind(Database::class, function() {
        $config = require basePath('env.php');
    
        return new Database($config['database']);
    });
};
