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

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\MissingValue;
use Illuminate\Support\Facades\Auth;

/** @mixin \App\Models\Channel */
class ChannelResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'   => $this->id,
            'name' => $this->name,

            'appeals' => [
                'opened' => $this->appeals_opened,
                'closed' => $this->appeals_closed,
            ],

            'can_delete' => $this->canDelete(),

            'bot' => BotResource::make($this->whenLoaded('bot')),
        ];
    }

    protected function canDelete(): bool
    {
        if ($this->whenLoaded('bot') instanceof MissingValue) {
            return false;
        }

        return $this->bot->owner_id === Auth::id();
    }
}
