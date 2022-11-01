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

app('router')
    ->name('auth.')
    ->prefix('auth')
    ->group(__DIR__ . '/groups/auth.php');

app('router')
    ->name('dashboard.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/dashboard.php');

app('router')
    ->name('pages.')
    ->prefix('pages')
    ->group(__DIR__ . '/groups/pages.php');

app('router')
    ->name('roles.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/roles.php');

app('router')
    ->name('bots.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/bots.php');

app('router')
    ->name('appeals.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/appeals.php');

app('router')
    ->name('channels.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/channels.php');

app('router')
    ->name('becomes.')
    ->middleware('auth.token')
    ->group(__DIR__ . '/groups/becomes.php');
