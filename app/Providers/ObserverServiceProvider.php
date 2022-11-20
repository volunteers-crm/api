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

namespace App\Providers;

use App\Models\Appeal;
use App\Models\Bot;
use App\Models\File;
use App\Models\Message;
use App\Models\User;
use App\Observers\AppealObserver;
use App\Observers\BotObserver;
use App\Observers\FileObserver;
use App\Observers\MessageObserver;
use App\Observers\UserObserver;
use Illuminate\Support\ServiceProvider;

class ObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Appeal::observe(AppealObserver::class);
        Bot::observe(BotObserver::class);
        File::observe(FileObserver::class);
        Message::observe(MessageObserver::class);
        User::observe(UserObserver::class);
    }
}
