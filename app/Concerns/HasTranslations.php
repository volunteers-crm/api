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

namespace App\Concerns;

use Illuminate\Support\Facades\App;

trait HasTranslations
{
    public function getTranslation(string $key, ?string $locale = null): mixed
    {
        $fallback = App::getLocale();
        $locale   = $locale ?: $fallback;

        $values = $this->getAttribute($key);

        return $values[$locale] ?? $values[$fallback];
    }
}
