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

namespace App\Observers;

use App\Helpers\BotInfo;
use App\Models\Bot;

class BotObserver
{
    public function __construct(
        protected BotInfo $info
    ) {
    }

    public function creating(Bot $bot): void
    {
        $bot->name = $this->info->getName($bot->token);
    }

    public function created(Bot $bot): void
    {
        $this->registerWebhook($bot);
    }

    protected function registerWebhook(Bot $bot): void
    {
        if (config('telegraph.security.register_webhook_when_model_was_created')) {
            $bot->registerWebhook()->send();
        }
    }
}
