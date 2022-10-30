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

namespace App\Policies\Becomes;

use App\Models\Bot;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class SearchPolicy
{
    use HandlesAuthorization;

    public function search(User $user, Bot $bot): Response
    {
        return $user->becomes()->where('id', $bot->id)->doesntExist()
            ? $this->allow()
            : $this->deny(__('You have already applied to this group'), 409);
    }
}
