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
use App\Objects\Messages\Document;
use App\Objects\Messages\Location;
use App\Objects\Messages\Text;
use DragonCode\Contracts\DataTransferObject\DataTransferObject;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class MessageCast implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): DataTransferObject|Document|Text|Location
    {
        return match ($attributes['type']) {
            MessageType::DOCUMENT => Document::fromJson($value),
            MessageType::LOCATION => Location::fromJson($value),
            default               => Text::fromJson($value)
        };
    }

    /**
     * @param $model
     * @param $key
     * @param \DragonCode\SimpleDataTransferObject\DataTransferObject $value
     * @param $attributes
     *
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        return $value->toJson();
    }
}
