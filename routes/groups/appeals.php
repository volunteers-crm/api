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

use App\Http\Controllers\AppealsController;
use App\Http\Controllers\MessagesController;

app('router')
    ->controller(AppealsController::class)
    ->prefix('appeals')
    ->group(static function () {
        app('router')->get('/', 'index');
        app('router')->get('{appeal}', 'show');
        app('router')->post('{appeal}/work', 'work');
        app('router')->post('{appeal}/publish', 'publish');
        app('router')->put('{appeal}/done', 'done');
        app('router')->delete('{appeal}/cancel', 'cancel');

        app('router')->get('{appeal}/messages', [MessagesController::class, 'index']);
        app('router')->post('{appeal}/messages', [MessagesController::class, 'store']);
    });
