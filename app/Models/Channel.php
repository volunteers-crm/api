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

use App\Models\Scopes\SortByNameScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Channel extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'name',
    ];

    protected $casts = [
        'user_id' => 'int',
    ];

    protected static function booted()
    {
        static::addGlobalScope(new SortByNameScope());
    }

    public function bot(): Relation
    {
        return $this->belongsTo(Bot::class);
    }
}
