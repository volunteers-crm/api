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

use App\Models\Scopes\SortByNameScope;
use Database\Factories\BotFactory;
use DefStudio\Telegraph\Database\Factories\TelegraphBotFactory;
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

    protected static function newFactory(): TelegraphBotFactory
    {
        return BotFactory::new();
    }

    public function owner(): Relation
    {
        return $this->belongsTo(User::class);
    }

    public function users(): Relation
    {
        return $this->belongsToMany(User::class, UserBot::class)->using(UserBot::class);
    }

    public function roles(): Relation
    {
        return $this->belongsToMany(Role::class, BotRole::class)->using(BotRole::class);
    }

    public function becomes(): Relation
    {
        return $this->belongsToMany(User::class, Become::class)->using(Become::class);
    }

    public function appeals(): Relation
    {
        return $this->hasMany(Appeal::class);
    }
}
