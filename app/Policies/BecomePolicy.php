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

namespace App\Policies;

use App\Models\Become;
use App\Models\Bot;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BecomePolicy extends BasePolicy
{
    public function create(User $user, Bot $bot): Response
    {
        return $this->has(
            $user->becomes()->where('id', $bot->id)->doesntExist(),
            __('You have already applied to this group.'),
            409
        );
    }

    public function confirm(User $user, Become $become): Response
    {
        return $this->has(
            $become->bot()->where('owner_id', $user->id)->exists()
        );
    }
}
