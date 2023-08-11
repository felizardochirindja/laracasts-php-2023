<?php

use Core\App;
use Modules\Auth\AuthService;

/** @var AuthService $authService */
$authService = App::resolveDependecy(AuthService::class);

$authService->signOut();

header('location: /');
die;
