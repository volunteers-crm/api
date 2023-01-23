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

namespace App\Providers;

use App\Models\Appeal;
use App\Models\Become;
use App\Models\Bot;
use App\Models\Channel;
use App\Models\File;
use App\Models\Message;
use App\Models\Page;
use App\Models\Role;
use App\Models\Social;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;

class MorphServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        Relation::enforceMorphMap([
            'appeal'  => Appeal::class,
            'become'  => Become::class,
            'bot'     => Bot::class,
            'channel' => Channel::class,
            'file'    => File::class,
            'message' => Message::class,
            'page'    => Page::class,
            'role'    => Role::class,
            'social'  => Social::class,
            'user'    => User::class,
        ]);
    }
}
