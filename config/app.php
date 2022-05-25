<?php

use App\Providers\AuthServiceProvider;
use App\Providers\EventServiceProvider;
use DragonCode\WebCore\Facades\Facade;

return [
    'providers' => Facade::defaultProviders()->merge([
        AuthServiceProvider::class,
        EventServiceProvider::class,
    ])->toArray(),
];
