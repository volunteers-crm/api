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

/** @mixin \App\Objects\Messages\Animation */
class AnimationResource extends BaseResource
{
    public function toArray($request): array
    {
        return [
            'text' => $this->text,

            'width'  => $this->width,
            'height' => $this->height,

            'filename' => $this->fileName,

            'size'      => $this->fileSize,
            'mime_type' => $this->mimeType,

            'url' => $this->downloadUrl(),
        ];
    }
}
