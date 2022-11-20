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

namespace App\Casts;

use App\Enums\MessageType;
use App\Objects\Messages\Animation;
use App\Objects\Messages\Audio;
use App\Objects\Messages\Contact;
use App\Objects\Messages\Document;
use App\Objects\Messages\Location;
use App\Objects\Messages\Photo;
use App\Objects\Messages\Sticker;
use App\Objects\Messages\Text;
use App\Objects\Messages\Unsupported;
use App\Objects\Messages\Video;
use App\Objects\Messages\VideoNote;
use App\Objects\Messages\Voice;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Spatie\LaravelData\Data;

class MessageCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): Data
    {
        return match ($attributes['type']) {
            MessageType::Animation => Animation::from($value),
            MessageType::Audio     => Audio::from($value),
            MessageType::Contact   => Contact::from($value),
            MessageType::Location  => Location::from($value),
            MessageType::Photo     => Photo::from($value),
            MessageType::Sticker   => Sticker::from($value),
            MessageType::Text      => Text::from($value),
            MessageType::Video     => Video::from($value),
            MessageType::VideoNote => VideoNote::from($value),
            MessageType::Voice     => Voice::from($value),
            MessageType::Document  => Document::from($value),
            default                => Unsupported::empty()
        };
    }

    /**
     * @param $model
     * @param $key
     * @param \Spatie\LaravelData\Data $value
     * @param $attributes
     *
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        return $value
            ->except('dataType', 'photos.dataType', 'messageId')
            ->toJson(JSON_UNESCAPED_UNICODE);
    }
}
