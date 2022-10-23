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

namespace App\Http\Resources\Pages;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\App;

/** @mixin \App\Models\Page */
class PageResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'slug'    => $this->slug,
            'title'   => $this->getTranslated('title'),
            'content' => $this->getTranslated('content'),
        ];
    }

    protected function getTranslated(string $key): ?string
    {
        return $this->getTranslation($key, $this->locale());
    }

    protected function locale(): string
    {
        return App::getLocale();
    }
}
