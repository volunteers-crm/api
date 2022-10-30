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

use App\Casts\Appeals\Info;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Appeal extends Model
{
    protected $fillable = [
        'bot_id',
        'client_id',
        'curator_id',
        'status',
        'info',
        'published_at',
    ];

    protected $casts = [
        'bot_id'     => 'int',
        'client_id'  => 'int',
        'curator_id' => 'int',

        'status' => Status::class,
        'info'   => Info::class,

        'published_at' => 'datetime',
    ];

    public function bot(): Relation
    {
        return $this->belongsTo(Bot::class);
    }

    public function client(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function curator(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function messages(): Relation
    {
        return $this->hasMany(Message::class)
            ->orderBy('id');
    }

    public function chats(): Relation
    {
        return $this->belongsToMany(Channel::class, AppealChannel::class)
            ->using(AppealChannel::class)
            ->withPivot('message_id');
    }
}
