<?php

namespace Tests;

use DragonCode\LaravelRouteNames\Application;
use Illuminate\Contracts\Console\Kernel;

trait CreatesApplication
{
    public function createApplication(): Application
    {
        $app = require __DIR__ . '/../vendor/dragon-code/web-core/bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }
}
