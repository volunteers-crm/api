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

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $this->call(UserSeeder::class);
            $this->call(BotSeeder::class);
            $this->call(ChannelSeeder::class);
            $this->call(RoleSeeder::class);
            $this->call(BecomeSeeder::class);
            $this->call(BotRoleSeeder::class);
            $this->call(AppealSeeder::class);
            $this->call(AppealChannelSeeder::class);
            $this->call(MessageSeeder::class);
        });
    }
}
