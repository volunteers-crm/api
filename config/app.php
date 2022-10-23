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

use App\Providers\AppServiceProvider;
use App\Providers\AuthServiceProvider;
use App\Providers\EventServiceProvider;
use App\Providers\MorphServiceProvider;
use App\Providers\ObserverServiceProvider;
use DragonCode\WebCore\Facades\Facade;
use Laravel\Socialite\Facades\Socialite;

return [
    'url_web' => env('APP_URL_WEB', env('APP_URL')),

    'providers' => Facade::defaultProviders()->merge([
        AppServiceProvider::class,
        AuthServiceProvider::class,
        EventServiceProvider::class,
        MorphServiceProvider::class,
        ObserverServiceProvider::class,
    ])->toArray(),

    'aliases' => Facade::defaultAliases()->merge([
        'Socialite' => Socialite::class,
    ])->toArray(),
];
