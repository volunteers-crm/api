<?php

declare(strict_types=1);

use App\Http\Controllers\Web\WelcomeController;

app('router')->get('/', WelcomeController::class);
