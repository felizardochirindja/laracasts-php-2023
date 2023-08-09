<?php

namespace Modules\Shared\Middlewares;

use Core\HTTPResponse;

class Guest
{
    public function handle()
    {
        if (($_SESSION['user'] ?? false)) {
            breakPage(HTTPResponse::Forbiden);
            die;
        }
    }
}
