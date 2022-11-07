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

namespace App\Policies;

use App\Models\Bot;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class BotPolicy extends BasePolicy
{
    public function update(User $user, Bot $bot): Response
    {
        return $this->has(
            $bot->owner_id === $user->id
        );
    }

    public function delete(User $user, Bot $bot): Response
    {
        return $this->has(
            $bot->owner_id === $user->id
        );
    }
}