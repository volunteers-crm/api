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

use App\Http\Controllers\BecomeController;

app('router')
    ->controller(BecomeController::class)
    ->prefix('becomes')
    ->group(static function () {
        app('router')->get('/', 'index');
        app('router')->get('{bot:name}', 'search');
        app('router')->post('{bot:name}', 'store');
        app('router')->delete('{bot:name}', 'cancel');
    });
