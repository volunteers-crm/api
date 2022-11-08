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

namespace App\Listeners\Bots;

use App\Events\Bots\BotCreatingEvent;
use App\Helpers\BotInfo;

class SetRealName
{
    public function __construct(
        protected BotInfo $info
    ) {
    }

    public function handle(BotCreatingEvent $event): void
    {
        $event->bot->name  = $this->info->getName($event->bot);
        $event->bot->title = $this->info->getTitle($event->bot);
    }
}
