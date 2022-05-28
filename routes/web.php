<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

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
