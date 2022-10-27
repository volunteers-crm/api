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

use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Message */
class MessageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'content' => $this->content,

            'type' => $this->type,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'sender' => UserResource::make($this->whenLoaded('sender')),
        ];
    }
}
