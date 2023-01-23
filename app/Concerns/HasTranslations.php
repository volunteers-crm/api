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

namespace App\Concerns;

use LaravelLang\Publisher\Facades\Helpers\Locales;

trait HasTranslations
{
    public function getTranslation(string $key, ?string $locale = null): mixed
    {
        $values = $this->getAttribute($key);

        return $values[$this->getLocale($locale)]
            ?? $values[$this->getDefaultLocale()]
            ?? $values[$this->getFallbackLocale()];
    }

    protected function getLocale(?string $locale): string
    {
        return $locale ?: $this->getDefaultLocale();
    }

    protected function getDefaultLocale(): string
    {
        return Locales::getDefault();
    }

    protected function getFallbackLocale(): string
    {
        return Locales::getFallback();
    }
}
