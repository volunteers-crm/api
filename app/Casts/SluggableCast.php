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

namespace App\Casts;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;
use Illuminate\Support\Str;

class SluggableCast implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): string
    {
        return $value;
    }

    public function set($model, string $key, $value, array $attributes): string
    {
        return Str::of($value)->trim()->slug()->toString();
    }
}
