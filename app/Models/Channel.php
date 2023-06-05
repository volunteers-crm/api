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

namespace App\Models;

use App\Casts\Channels\NameCast;
use App\Concerns\Eloquent\HasOwner;
use App\Models\Scopes\SortByNameScope;
use Database\Factories\ChannelFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphChatFactory;
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Relation;

class Channel extends TelegraphChat
{
    use HasFactory;

    use HasOwner;

    protected $casts = [
        'chat_id' => 'int',

        'name' => NameCast::class,
    ];

    public static function booted()
    {
        static::addGlobalScope(new SortByNameScope());

        parent::booted();
    }

    protected static function newFactory(): TelegraphChatFactory
    {
        return ChannelFactory::new();
    }

    public function owner(): Relation
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function appeals(): Relation
    {
        return $this->belongsToMany(Appeal::class, AppealChannel::class);
    }

    public function scopePublic(Builder $builder)
    {
        $builder->where('chat_id', '<', 0);
    }
}
