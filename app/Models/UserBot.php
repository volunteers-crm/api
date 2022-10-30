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

use App\Enums\Status;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Relations\Relation;

class UserBot extends Pivot
{
    public $incrementing = true;

    protected $fillable = [
        'user_id',
        'bot_id',

        'status',
        'is_coordinator',

        'city',
        'about',
        'source',

        'recommendations',
        'socials',
    ];

    protected $casts = [
        'user_id' => 'int',
        'bot_id'  => 'int',

        'status' => Status::class,

        'is_coordinator' => 'bool',

        'recommendations' => 'array',
        'socials'         => 'array',
    ];

    public function bot(): Relation
    {
        return $this->belongsTo(Bot::class);
    }

    public function user(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function roles(): Relation
    {
        return $this->hasManyThrough(Role::class, User::class, 'id', 'user_id', 'user_id', 'id');
    }
}
