<?php

/**
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 * @copyright 2023 Andrey Helldar
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Providers;

use App\Events\Bots\BotCreatedEvent;
use App\Events\Bots\BotCreatingEvent;
use App\Listeners\Bots\RegisterWebhook;
use App\Listeners\Bots\SetRealName;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Telegram\TelegramExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        SocialiteWasCalled::class => [
            TelegramExtendSocialite::class,
        ],

        BotCreatingEvent::class => [
            SetRealName::class,
        ],

        BotCreatedEvent::class => [
            RegisterWebhook::class,
        ],
    ];

    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
