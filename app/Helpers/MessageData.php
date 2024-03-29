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

namespace App\Helpers;

use App\Enums\MessageType;
use App\Objects\Messages\Animation;
use App\Objects\Messages\Audio;
use App\Objects\Messages\BaseData;
use App\Objects\Messages\Contact;
use App\Objects\Messages\Document;
use App\Objects\Messages\Location;
use App\Objects\Messages\Passport;
use App\Objects\Messages\Photo;
use App\Objects\Messages\Sticker;
use App\Objects\Messages\Text;
use App\Objects\Messages\Unsupported;
use App\Objects\Messages\Video;
use App\Objects\Messages\VideoNote;
use App\Objects\Messages\Voice;
use DragonCode\Support\Concerns\Makeable;
use DragonCode\Support\Facades\Helpers\Arr;

class MessageData
{
    use Makeable;

    /** @var array<string, class-string|BaseData> */
    protected array $models = [
        'animation'  => Animation::class,
        'audio'      => Audio::class,
        'contact'    => Contact::class,
        'location'   => Location::class,
        'passport'   => Passport::class,
        'photo'      => Photo::class,
        'sticker'    => Sticker::class,
        'text'       => Text::class,
        'video'      => Video::class,
        'video_note' => VideoNote::class,
        'voice'      => Voice::class,
        'document'   => Document::class,
    ];

    protected string $default = Unsupported::class;

    public function convert(array $data): BaseData
    {
        foreach ($this->models as $key => $model) {
            if (isset($data['message'][$key])) {
                return $this->resolveData($model, $data, $key);
            }
        }

        return $this->resolveData($this->default, $data);
    }

    protected function resolveData(BaseData|string $model, array $data, ?string $key = null): BaseData
    {
        return $model::from(array_merge(
            $this->mapData($data, $key),
            $this->additionalData($data)
        ));
    }

    protected function additionalData(array $data): array
    {
        return [
            'message_id' => Arr::get($data, 'message.message_id'),
            'text'       => Arr::get($data, 'message.text') ?: Arr::get($data, 'message.caption'),
        ];
    }

    protected function mapData(array $data, ?string $key): array
    {
        return match ($key) {
            MessageType::Photo->value => $this->resolveContent($data, $key . '.1'),
            MessageType::Text->value  => ['text' => $this->resolveContent($data, $key)],
            default                   => $this->resolveContent($data, $key)
        };
    }

    protected function resolveContent(array $data, ?string $key): mixed
    {
        return Arr::get($data, "message.$key", []);
    }
}
