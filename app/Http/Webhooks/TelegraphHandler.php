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

namespace App\Http\Webhooks;

use App\Processors\Appeal as AppealProcessor;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

/**
 * @property \App\Models\Bot $bot
 * @property \App\Models\Channel $chat
 */
class TelegraphHandler extends WebhookHandler
{
    public function connect(mixed $parameter)
    {
        Log::info('Call the `connect` bot\'s command', compact('parameter'));
    }

    protected function handleChatMessage(Stringable $text): void
    {
        if ($this->isAppeal()) {
            AppealProcessor::make($this->bot, $this->chat)->handle(
                $this->request->all()
            );
        }
    }

    protected function isAppeal(): bool
    {
        return $this->chat->chat_id > 0;
    }
}
