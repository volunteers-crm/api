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

namespace App\Enums;

use App\Models\User;
use ArchTech\Enums\InvokableCases;
use Illuminate\Support\Str;

/**
 * @method static string USER()
 */
enum Channel: string
{
    use InvokableCases;

    case USER = 'users.{id}';

    public static function toUser(User $user): string
    {
        return Str::replace('{id}', $user->id, Channel::USER());
    }
}
