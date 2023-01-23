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

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use LaravelLang\Publisher\Facades\Helpers\Locales;

class LocaleRule implements Rule
{
    public function passes($attribute, $value): bool
    {
        return in_array($value, $this->available());
    }

    public function message(): string
    {
        return __('validation.locale');
    }

    protected function available(): array
    {
        return Locales::installed();
    }
}
