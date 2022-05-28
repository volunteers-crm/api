<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Social extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'type',
        'title',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'bool',
    ];

    public function users(): Relation
    {
        return $this->hasMany(User::class);
    }

    public function resolveRouteBinding($value, $field = null): Model|Relation|null
    {
        return $this->resolveRouteBindingQuery($this, $value, $field)->active()->first();
    }

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('is_active', true);
    }
}
