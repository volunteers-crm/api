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

namespace App\Events\Messages;

use App\Enums\Channel as ChannelName;
use App\Enums\Queue;
use App\Http\Resources\MessageResource;
use App\Models\Message;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SendToCuratorEvent implements ShouldBroadcast
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;
    use Queueable;

    public function __construct(
        public Message $message
    ) {
        $this->queue = Queue::Messages();

        $this->afterCommit = true;
    }

    public function broadcastOn(): Channel
    {
        return new PrivateChannel($this->channelName());
    }

    public function broadcastWith(): array
    {
        return MessageResource::make($this->message)->resolve();
    }

    public function broadcastWhen(): bool
    {
        return ! empty($this->message->appeal->curator_id);
    }

    protected function channelName(): string
    {
        return ChannelName::toUser($this->message->appeal->curator_id);
    }
}
