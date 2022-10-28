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

namespace App\Jobs\Messages;

use App\Enums\Queue;
use App\Models\Bot;
use App\Models\Channel;
use App\Models\Message;
use DefStudio\Telegraph\Facades\Telegraph;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendToClientJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    public function __construct(
        public Message $message
    ) {
        $this->queue = Queue::MESSAGES();
    }

    public function handle()
    {
        Telegraph::bot($this->bot())
            ->chat($this->chat())
            ->message($this->text())
            ->send();
    }

    protected function bot(): Bot
    {
        return $this->message->appeal->bot;
    }

    protected function chat(): Channel
    {
        return $this->message->appeal->client->chat;
    }

    protected function text(): string
    {
        return $this->message->content->text;
    }
}
