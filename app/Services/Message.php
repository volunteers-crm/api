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

namespace App\Services;

use App\Enums\MessageType;
use App\Jobs\Files\DownloadFileJob;
use App\Models\Appeal as AppealModel;
use App\Models\Bot as BotModel;
use App\Models\File as FileModel;
use App\Models\Message as MessageModel;
use App\Models\User as UserModel;
use App\Objects\Messages\Text;
use Illuminate\Database\Eloquent\Collection;

class Message
{
    public function index(AppealModel $appeal): Collection
    {
        return $appeal->messages->loadMissing('sender');
    }

    public function store(UserModel $user, AppealModel $appeal, string $text): MessageModel
    {
        return $appeal->messages()->create([
            'user_id' => $user->id,
            'content' => Text::from(compact('text')),
            'type'    => MessageType::Text,
        ])->load('sender');
    }

    public function file(BotModel $bot, MessageModel $message): FileModel
    {
        if ($message->file()->doesntExist()) {
            DownloadFileJob::dispatchSync($bot, $message, $message->content->fileId, $message->content->fileUniqueId);
        }

        return $message->file;
    }
}
