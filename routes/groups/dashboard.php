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

use App\Http\Controllers\DashboardController;

/**
 * @routePrefix("dashboard.")
 */

app('router')
    ->controller(DashboardController::class)
    ->prefix('dashboard')
    ->group(static function () {
        app('router')->get('appeals', 'appeals');
        app('router')->get('coordinators', 'coordinators');
        app('router')->get('storages', 'storages');
        app('router')->get('roles', 'roles');
    });
