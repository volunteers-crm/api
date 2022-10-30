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

/** @mixin \App\Models\UserBot */
class BecomesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'city'   => $this->city,
            'about'  => $this->about,
            'source' => $this->source,

            'is_coordinator' => $this->is_coordinator,

            'recommendations' => $this->recommendations,
            'socials'         => $this->socials,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'bot'   => BotResource::make($this->whenLoaded('bot')),
            'user'  => UserResource::make($this->whenLoaded('user')),
            'roles' => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }
}
