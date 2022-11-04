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
use App\Models\Become;
use App\Models\Bot;
use App\Models\Channel;
use App\Models\Message;
use App\Models\Role;
use App\Policies\AppealPolicy;
use App\Policies\BecomePolicy;
use App\Policies\BotPolicy;
use App\Policies\ChannelPolicy;
use App\Policies\MessagePolicy;
use App\Policies\RolePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Appeal::class  => AppealPolicy::class,
        Become::class  => BecomePolicy::class,
        Bot::class     => BotPolicy::class,
        Channel::class => ChannelPolicy::class,
        Message::class => MessagePolicy::class,
        Role::class    => RolePolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();
    }
}
