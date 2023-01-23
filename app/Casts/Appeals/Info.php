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

namespace App\Casts\Appeals;

use App\Objects\Appeals\Appeal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Info implements CastsAttributes
{
    public function get($model, string $key, $value, array $attributes): Appeal
    {
        return Appeal::from($value ?: []);
    }

    public function set($model, string $key, $value, array $attributes): string
    {
        $value = $value instanceof Appeal ? $value : Appeal::from($value ?: []);

        return $value->toJson();
    }
}
