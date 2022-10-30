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
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Database\Eloquent\Relations\Relation;
use LaravelLang\Publisher\Constants\Locales;

class Bot extends TelegraphBot
{
    protected $fillable = [
        'owner_id',
        'name',
        'title',
        'token',
        'timezone',
        'locale',
    ];

    protected $casts = [
        'owner_id' => 'int',

        'locale' => Locales::class,
    ];

    public static function booted()
    {
        static::addGlobalScope(new SortByNameScope());

        parent::booted();
    }

    public function owner(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function roles(): Relation
    {
        return $this->belongsToMany(Role::class)->using(BotRole::class);
    }
}
