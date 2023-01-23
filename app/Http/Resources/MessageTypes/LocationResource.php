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

namespace App\Http\Resources\MessageTypes;

/** @mixin \App\Objects\Messages\Location */
class LocationResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'longitude' => $this->longitude,
            'latitude'  => $this->latitude,
        ];
    }
}
