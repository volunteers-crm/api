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

use App\Providers\AuthServiceProvider;
use App\Providers\EventServiceProvider;
use DragonCode\WebCore\Facades\Facade;

return [
    'providers' => Facade::defaultProviders()->merge([
        AuthServiceProvider::class,
        EventServiceProvider::class,
    ])->toArray(),
];
