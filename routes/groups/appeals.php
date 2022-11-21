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

// @routePrefix("appeals.")

app('router')
    ->controller(AppealsController::class)
    ->prefix('appeals')
    ->group(static function () {
        app('router')->get('/', 'index');

        app('router')
            ->get('{appeal}', 'show')
            ->can(Policy::Show(), 'appeal');

        app('router')
            ->put('{appeal}/work', 'work')
            ->can(Policy::Update(), 'appeal');

        app('router')
            ->put('{appeal}/publish', 'publish')
            ->can(Policy::Update(), 'appeal');

        app('router')
            ->put('{appeal}/done', 'done')
            ->can(Policy::Update(), 'appeal');

        app('router')
            ->delete('{appeal}/cancel', 'cancel')
            ->can(Policy::Update(), 'appeal');
    });

app('router')
    ->controller(MessagesController::class)
    ->name('messages.')
    ->prefix('appeals/{appeal}/messages')
    ->group(static function () {
        app('router')
            ->get('/', 'index')
            ->can(Policy::Index(), [Message::class, 'appeal']);

        app('router')
            ->post('/', 'store')
            ->can(Policy::Create(), [Message::class, 'appeal']);

        app('router')
            ->middleware('signed')
            ->name('download')
            ->get('{message}/download', 'download')
            ->can(Policy::Show(), [Message::class, 'appeal']);
    });
