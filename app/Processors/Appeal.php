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

use App\Enums\MessageType;
use App\Enums\Status;
use App\Helpers\MessageToDTO;
use App\Models\Appeal as AppealModel;
use App\Models\User;
use App\Models\User as UserModel;
use DragonCode\SimpleDataTransferObject\DataTransferObject;

class Appeal extends BaseProcessor
{
    public function handle(array $data): void
    {
        $client  = $this->getClient();
        $appeal  = $this->getAppeal($client);
        $content = $this->resolveContent($data);

        $this->store($appeal, $client, $content);
    }

    protected function store(AppealModel $appeal, UserModel $client, DataTransferObject $text): void
    {
        $appeal->messages()->create([
            'user_id' => $client->id,
            'content' => $text,
            'type'    => MessageType::TEXT,
        ]);
    }

    protected function getAppeal(User $client): AppealModel
    {
        return AppealModel::query()
            ->where('client_id', $client->id)
            ->whereNotIn('status', [Status::DONE, Status::CLOSED])
            ->firstOrCreate([
                'bot_id'    => $this->bot->id,
                'client_id' => $client->id,
            ]);
    }

    protected function getClient(): UserModel
    {
        return UserModel::firstOrCreate([
            'social_id'   => $this->getSocialId(),
            'external_id' => $this->getChatId(),
        ], [
            'username' => $this->chat->name,
            'name'     => $this->chat->name,
        ]);
    }

    protected function getChatId(): int
    {
        return $this->chat->chat_id;
    }

    protected function getSocialId(): int
    {
        return $this->bot->owner->social_id;
    }

    protected function resolveContent(array $data): DataTransferObject
    {
        return MessageToDTO::make()->convert($data);
    }
}
