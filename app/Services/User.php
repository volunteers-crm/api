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

namespace App\Services;

use App\Models\Social;
use App\Models\User as Model;
use Laravel\Socialite\Contracts\User as SocialUser;

class User
{
    public function register(Social $social, SocialUser $user): Model
    {
        $external_id = $user->getId();
        $username    = $user->getNickname();
        $name        = $user->getName();
        $avatar      = $user->getAvatar();

        return $social->users()->updateOrCreate(
            compact('external_id'),
            compact('username', 'name', 'avatar')
        );
    }

    public function token(Model $user, string $name): string
    {
        $user->tokens()->delete();

        return $user->createToken($name)->plainTextToken;
    }
}
