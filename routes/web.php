<?php

declare(strict_types=1);

use App\Http\Controllers\SeoController;
use App\Http\Controllers\Web\AdminController;
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\IndexController;

app('router')
    ->get('robots.txt', [SeoController::class, 'robots']);

app('router')
    ->middleware('guest')
    ->prefix('auth')
    ->group(function () {
        app('router')->get('login', [AuthController::class, 'index']);

        app('router')->post('telegram', [AuthController::class, 'telegram']);
    });

app('router')
    ->get('/', [IndexController::class, 'home']);

app('router')
    ->middleware('auth')
    ->get('admin/{slug?}', AdminController::class)
    ->where('slug', '.?');
