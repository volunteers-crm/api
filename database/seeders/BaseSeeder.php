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

namespace Database\Seeders;

use App\Models\Appeal;
use App\Models\Bot;
use App\Models\Role;
use App\Models\User;
use Closure;
use Illuminate\Database\Seeder;

abstract class BaseSeeder extends Seeder
{
    protected int $exceptUser = 1;

    abstract public function run(): void;

    protected function users(Closure $callback): void
    {
        User::query()
            ->with('ownedRoles')
            ->where('id', '<>', $this->exceptUser)
            ->get()
            ->each(fn (User $user) => $callback($user));
    }

    protected function bots(Closure $callback): void
    {
        $this->users(function (User $user) use ($callback) {
            $user->ownedBots->each(
                fn (Bot $bot) => $callback($user, $bot)
            );
        });
    }

    protected function roles(Closure $callback): void
    {
        $this->bots(function (User $user, Bot $bot) use ($callback) {
            $bot->roles->each(
                fn (Role $role) => $callback($bot, $role)
            );
        });
    }

    protected function appeals(Closure $callback): void
    {
        $this->bots(function (User $user, Bot $bot) use ($callback) {
            $bot->appeals->each(
                fn (Appeal $appeal) => $callback($bot, $appeal)
            );
        });
    }
}
