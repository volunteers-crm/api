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

namespace App\Casts\Appeals;

use App\Objects\Appeals\Appeal;
use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class Info implements CastsAttributes
{
    public function get($model, $key, $value, $attributes): Appeal
    {
        return Appeal::from($value ?: []);
    }

    /**
     * @param $model
     * @param $key
     * @param Appeal|array $value
     * @param $attributes
     *
     * @return string
     */
    public function set($model, $key, $value, $attributes): string
    {
        $value = $value instanceof Appeal ? $value : Appeal::from($value ?: []);

        return $value->toJson();
    }
}
