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

use App\Models\Scopes\SortByTitleScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'owner_id',
        'title',
        'is_storage',
    ];

    protected $casts = [
        'is_storage' => 'bool',
    ];

    public function users(): Relation
    {
        return $this->belongsToMany(User::class, UserRole::class, 'role_id', 'user_id', 'id', 'id');
    }

    protected static function booted()
    {
        static::addGlobalScope(new SortByTitleScope());
    }
}
