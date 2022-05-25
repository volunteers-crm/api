<?php

namespace App\Http;

use DragonCode\WebCore\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    protected $routeMiddleware = [];
}
