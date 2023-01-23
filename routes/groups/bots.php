<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

use App\Enums\Policy;
use App\Http\Controllers\BotsController;

app('router')
    ->controller(BotsController::class)
    ->prefix('bots')
    ->group(static function () {
        app('router')->get('/', 'index');
        app('router')->post('/', 'store');

        app('router')
            ->put('{bot:id}', 'update')
            ->can(Policy::Update(), 'bot');

        app('router')
            ->delete('{bot:id}', 'destroy')
            ->can(Policy::Delete(), 'bot');
    });
