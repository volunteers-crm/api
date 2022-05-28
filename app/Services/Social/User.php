<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

declare(strict_types=1);

namespace App\Services\Social;

use App\Models\Social;
use App\Models\User as UserModel;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Laravel\Socialite\Contracts\User as UserContract;

class User
{
    public function register(Social $social, UserContract $user): Model|Relation|UserModel
    {
        $external_id = $user->getId();
        $username    = $user->getNickname();
        $name        = $user->getName();
        $avatar      = $user->getAvatar();

        return $social->users()->updateOrCreate(
            compact('external_id'),
            compact('username', 'avatar', 'name')
        );
    }
}
