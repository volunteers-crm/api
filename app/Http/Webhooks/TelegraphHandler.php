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

use App\Enums\MessageType;
use App\Enums\Status;
use App\Models\Appeal;
use App\Models\User;
use App\Objects\Messages\Text;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DragonCode\SimpleDataTransferObject\DataTransferObject;
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
        Log::info('aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', compact('parameter'));
    }

    protected function handleChatMessage(Stringable $text): void
    {
        if ($this->doesntAppeal()) {
            Log::info('it is a not appeal', [
                $this->chat,
            ]);

            return;
        }

        $client = $this->getClient();

        $this->storeMessageToAppeal(
            $this->getAppeal($client),
            $client,
            $this->resolveMessage($text->toString())
        );
    }

    protected function storeMessageToAppeal(Appeal $appeal, User $client, DataTransferObject $text): void
    {
        $appeal->messages()->create([
            'user_id' => $client->id,
            'content' => $text,
            'type'    => MessageType::TEXT,
        ]);
    }

    protected function getAppeal(User $client): Appeal
    {
        return Appeal::query()
            ->where('client_id', $client->id)
            ->whereNotIn('status', [Status::DONE, Status::CLOSED])
            ->firstOrCreate([
                'bot_id'    => $this->bot->id,
                'client_id' => $client->id,
            ]);
    }

    protected function doesntAppeal(): bool
    {
        return $this->getChatId() < 0;
    }

    protected function getChatId(): int
    {
        return $this->chat->chat_id;
    }

    protected function getClient(): User
    {
        return User::firstOrCreate([
            'social_id'   => $this->getSocialId(),
            'external_id' => $this->getChatId(),
        ], [
            'username' => $this->chat->name,
            'name'     => $this->chat->name,
        ]);
    }

    protected function getSocialId(): int
    {
        return $this->bot->owner->social_id;
    }

    protected function resolveMessage(string $text): DataTransferObject
    {
        return Text::make(compact('text'));
    }
}
