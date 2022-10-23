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

use App\Http\Controllers\AuthController;

app('router')
    ->controller(AuthController::class)
    ->prefix('auth')
    ->group(static function () {

        app('router')
            ->post('{social:type}/confirm', 'confirm');

        app('router')
            ->middleware('auth.token')
            ->get('me', 'me');
    });