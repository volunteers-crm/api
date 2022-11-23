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
use LaravelLang\Publisher\Facades\Helpers\Locales;

/** @mixin \App\Models\Bot */
class BotResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->id,

            'name'  => $this->name,
            'title' => $this->title,

            'timezone' => $this->getTimezone(),
            'locale'   => $this->getLocale(),

            'appeals' => [
                'opened' => $this->appeals_opened,
                'closed' => $this->appeals_closed,
            ],

            'channels' => ChannelResource::collection($this->whenLoaded('chats')),
            'roles'    => RoleResource::collection($this->whenLoaded('roles')),
        ];
    }

    protected function getTimezone(): string
    {
        return $this->timezone ?: config('app.timezone');
    }

    protected function getLocale(): string
    {
        return $this->locale?->value ?? Locales::getDefault();
    }
}
