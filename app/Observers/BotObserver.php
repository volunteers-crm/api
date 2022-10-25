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
}
