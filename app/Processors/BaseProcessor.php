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

namespace App\Processors;

use App\Models\Bot;
use App\Models\Channel;
use DragonCode\Support\Concerns\Makeable;

/**
 * @method static $this make(Bot $bot, Channel $chat)
 */
abstract class BaseProcessor
{
    use Makeable;

    public function __construct(
        protected Bot $bot,
        protected Channel $chat
    ) {
    }
}
