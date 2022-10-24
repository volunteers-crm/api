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
use DefStudio\Telegraph\Models\TelegraphChat;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\Relation;

class Channel extends TelegraphChat
{
    public static function booted()
    {
        static::addGlobalScope(new SortByNameScope());

        parent::booted();
    }

    public function bots(): BelongsToMany
    {
        return $this->belongsToMany(Bot::class, BotChannel::class);
    }

    public function owner(): Relation
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
