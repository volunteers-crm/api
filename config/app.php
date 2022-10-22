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

use App\Providers\AuthServiceProvider;
use App\Providers\EventServiceProvider;
use App\Providers\ObserverServiceProvider;
use App\Providers\SanctumServiceProvider;
use DragonCode\WebCore\Facades\Facade;
use Laravel\Socialite\Facades\Socialite;

return [
    'url_web' => env('APP_URL_WEB', env('APP_URL')),

    'providers' => Facade::defaultProviders()->merge([
        AuthServiceProvider::class,
        EventServiceProvider::class,
        ObserverServiceProvider::class,
        SanctumServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Socialite' => Socialite::class,
    ])->toArray(),
];
