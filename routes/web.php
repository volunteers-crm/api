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

app('router')
    ->name('main')
    ->group(base_path('routes/web/main.php'));

app('router')
    ->middleware('guest')
    ->prefix('auth')
    ->group(base_path('routes/web/auth.php'));

app('router')
    ->name('seo')
    ->group(base_path('routes/web/seo.php'));

app('router')
    ->middleware('auth')
    ->prefix('admin')
    ->group(base_path('routes/web/admin.php'));
