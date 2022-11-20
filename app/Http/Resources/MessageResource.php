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

use App\Enums\MessageType;
use App\Http\Resources\MessageTypes\AnimationResource;
use App\Http\Resources\MessageTypes\AudioResource;
use App\Http\Resources\MessageTypes\ContactResource;
use App\Http\Resources\MessageTypes\DocumentResource;
use App\Http\Resources\MessageTypes\LocationResource;
use App\Http\Resources\MessageTypes\PhotoResource;
use App\Http\Resources\MessageTypes\StickerResource;
use App\Http\Resources\MessageTypes\UnsupportedResource;
use App\Http\Resources\MessageTypes\VideoNoteResource;
use App\Http\Resources\MessageTypes\VideoResource;
use App\Http\Resources\MessageTypes\VoiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Message */
class MessageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'content' => $this->content(),

            'type' => $this->type,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'sender' => UserResource::make($this->whenLoaded('sender')),
        ];
    }

    protected function content(): JsonResource
    {
        return match ($this->type) {
            MessageType::Animation => AnimationResource::make($this->content),
            MessageType::Audio     => AudioResource::make($this->content),
            MessageType::Contact   => ContactResource::make($this->content),
            MessageType::Document  => DocumentResource::make($this->content),
            MessageType::Location  => LocationResource::make($this->content),
            MessageType::Photo     => PhotoResource::make($this->content),
            MessageType::Sticker   => StickerResource::make($this->content),
            MessageType::Text      => TextResource::make($this->content),
            MessageType::Video     => VideoResource::make($this->content),
            MessageType::VideoNote => VideoNoteResource::make($this->content),
            MessageType::Voice     => VoiceResource::make($this->content),
            default                => UnsupportedResource::make($this->content),
        };
    }
}
