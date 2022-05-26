<?php

declare(strict_types=1);

use App\Http\Controllers\Web\IndexController;

app('router')->get('/', IndexController::class);
