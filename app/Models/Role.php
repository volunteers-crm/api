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
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    protected $fillable = [
        'user_id',
        'role_category_id',
        'title',
        'can_storage',
    ];

    protected $casts = [
        'can_storage' => 'bool',
    ];

    public function category(): Relation
    {
        return $this->belongsTo(RoleCategory::class);
    }
}
