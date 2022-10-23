<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2022 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Roles\RolesController;
use App\Http\Controllers\Users\UserController;

app('router')->post('auth/{social:type}/confirm', AuthController::class);

app('router')->get('pages/{page:slug}', PagesController::class);

app('router')
    ->middleware('auth.token')
    ->group(static function () {
        app('router')->get('user', UserController::class);

        app('router')->apiResource('roles', RolesController::class);
    });
