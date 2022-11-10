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
use App\Objects\Messages\Contact;
use App\Objects\Messages\Document;
use App\Objects\Messages\Location;
use App\Objects\Messages\Photo;
use App\Objects\Messages\Sticker;
use App\Objects\Messages\Text;
use App\Objects\Messages\Video;
use App\Objects\Messages\VideoNote;
use App\Objects\Messages\Voice;
use DragonCode\SimpleDataTransferObject\DataTransferObject;
use DragonCode\Support\Concerns\Makeable;
use Illuminate\Support\Collection;

class MessageToDTO
{
    use Makeable;

    /** @var array<string, class-string|DataTransferObject> */
    protected array $models = [
        'animation'  => Animation::class,
        'audio'      => Audio::class,
        'contact'    => Contact::class,
        'location'   => Location::class,
        'photo'      => Photo::class,
        'sticker'    => Sticker::class,
        'video'      => Video::class,
        'video_note' => VideoNote::class,
        'voice'      => Voice::class,
        'document'   => Document::class,
    ];

    protected string $default = Text::class;

    public function convert(array $data): DataTransferObject|Collection|null
    {
        foreach ($this->models as $key => $model) {
            if ($content = $data[$key] ?? false) {
                return $key === 'photo'
                    ? $this->resolvePhoto($content)
                    : $this->resolveData($content, $model);
            }
        }

        return null;
    }

    protected function resolvePhoto(array $data): Collection
    {
        return collect($data)->mapInto(Photo::class);
    }

    protected function resolveData(array $data, DataTransferObject|string $model): DataTransferObject
    {
        return $model::make($data);
    }
}
