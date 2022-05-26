<?php

declare(strict_types=1);

use App\Http\Controllers\SeoController;
use App\Http\Controllers\Web\IndexController;

Auth::routes();

app('router')
    ->get('robots.txt', [SeoController::class, 'robots']);

app('router')
    ->get('{slug}', IndexController::class)
    ->where('slug', '.?');
