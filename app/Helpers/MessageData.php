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

namespace App\Helpers;

use App\Objects\Messages\Animation;
use App\Objects\Messages\Audio;
use App\Objects\Messages\BaseData;
use App\Objects\Messages\Contact;
use App\Objects\Messages\Document;
use App\Objects\Messages\Location;
use App\Objects\Messages\Photos;
use App\Objects\Messages\Sticker;
use App\Objects\Messages\Text;
use App\Objects\Messages\Unsupported;
use App\Objects\Messages\Video;
use App\Objects\Messages\VideoNote;
use App\Objects\Messages\Voice;
use DragonCode\Support\Concerns\Makeable;

class MessageData
{
    use Makeable;

    /** @var array<string, class-string|BaseData> */
    protected array $models = [
        'animation'  => Animation::class,
        'audio'      => Audio::class,
        'contact'    => Contact::class,
        'document'   => Document::class,
        'location'   => Location::class,
        'photo'      => Photos::class,
        'sticker'    => Sticker::class,
        'text'       => Text::class,
        'video'      => Video::class,
        'video_note' => VideoNote::class,
        'voice'      => Voice::class,
    ];

    protected string $default = Unsupported::class;

    public function convert(array $data): BaseData
    {
        foreach ($this->models as $key => $model) {
            if (isset($data[$key])) {
                return $this->resolveData($model, $data[$key], $key);
            }
        }

        return $this->resolveData($this->default, compact('data'));
    }

    protected function resolveData(BaseData|string $model, array|string $data = [], ?string $key = null): BaseData
    {
        return $model::from(
            $this->mapData($data, $key)
        );
    }

    protected function mapData(array|string $data, ?string $key): array
    {
        return match ($key) {
            'text'  => ['text' => $data],
            'photo' => ['photos' => $data],
            default => $data
        };
    }
}
