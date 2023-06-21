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

namespace App\Events\Bots;

use App\Models\Bot;
use Illuminate\Foundation\Events\Dispatchable;

class BotCreatedEvent
{
    use Dispatchable;

    public function __construct(
        public Bot $bot
    ) {}
}
