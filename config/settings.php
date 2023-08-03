<?php

use Core\Container;

return function(Container $container): void {
    $container->bind('settings', function() {
        return require fileFromRoot('env', '/');
    });
};
