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

use App\Enums\Policy;
use App\Http\Controllers\AppealsController;
use App\Http\Controllers\MessagesController;
use App\Models\Message;

app('router')
    ->controller(AppealsController::class)
    ->prefix('appeals')
    ->group(static function () {

        app('router')->get('/', 'index');

        app('router')
            ->get('{appeal}', 'show')
            ->can(Policy::SHOW(), 'appeal');

        app('router')
            ->put('{appeal}/work', 'work')
            ->can(Policy::UPDATE(), 'appeal');

        app('router')
            ->put('{appeal}/publish', 'publish')
            ->can(Policy::UPDATE(), 'appeal');

        app('router')
            ->put('{appeal}/done', 'done')
            ->can(Policy::UPDATE(), 'appeal');

        app('router')
            ->delete('{appeal}/cancel', 'cancel')
            ->can(Policy::UPDATE(), 'appeal');
    });

app('router')
    ->controller(MessagesController::class)
    ->prefix('appeals/{appeal}/messages')
    ->group(static function () {

        app('router')
            ->get('/', 'index')
            ->can(Policy::INDEX(), [Message::class, 'appeal']);

        app('router')
            ->post('/', 'store')
            ->can(Policy::CREATE(), [Message::class, 'appeal']);
    });
