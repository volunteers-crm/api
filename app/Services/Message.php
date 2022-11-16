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

namespace App\Services;

use App\Enums\MessageType;
use App\Models\Appeal as AppealModel;
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
        $message = $appeal->messages()->create([
            'user_id' => $user->id,
            'content' => Text::make(compact('text')),
            'type'    => MessageType::Text,
        ]);

        return $message->loadMissing('sender');
    }
}
