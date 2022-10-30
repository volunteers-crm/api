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

namespace App\Http\Resources;

use App\Enums\Status;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Appeal */
class AppealResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'     => $this->id,
            'status' => $this->status,

            'info' => $this->info,

            'is_published' => ! empty($this->published_at),
            'is_closed'    => $this->hasClosed(),

            'published_at' => $this->published_at,
            'created_at'   => $this->created_at,
            'updated_at'   => $this->updated_at,

            'bot'     => BotResource::make($this->whenLoaded('bot')),
            'client'  => UserResource::make($this->whenLoaded('client')),
            'curator' => UserResource::make($this->whenLoaded('curator')),
        ];
    }

    protected function hasClosed(): bool
    {
        return in_array($this->status, [Status::DONE, Status::CANCELLED]);
    }
}
