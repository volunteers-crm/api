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

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'can_storage',
    ];

    protected $casts = [
        'user_id' => 'int',

        'can_storage' => 'bool',
    ];
}
