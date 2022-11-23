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

namespace App\Http\Resources\MessageTypes;

/** @mixin \App\Objects\Messages\Audio */
class AudioResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'text' => $this->text,

            'performer' => $this->performer,
            'title'     => $this->title,

            'duration' => $this->duration,

            'filename'  => $this->fileName,
            'mime_type' => $this->mimeType,

            'url' => $this->downloadUrl(),
        ];
    }
}
