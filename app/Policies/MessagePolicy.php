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

use App\Models\Appeal;
use App\Models\Message;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Database\Eloquent\Builder;

class MessagePolicy extends BasePolicy
{
    public function index(User $user, Appeal $appeal): Response
    {
        return $this->has(
            $this->byAppeal($user, $appeal)
        );
    }

    public function create(User $user, Appeal $appeal): Response
    {
        return $this->has(
            $this->byAppeal($user, $appeal)
        );
    }

    public function show(User $user, Appeal $appeal, Message $message): Response
    {
        return $this->has(
            $this->byMessage($user, $appeal, $message)
        );
    }

    protected function byMessage(User $user, Appeal $appeal, Message $message): bool
    {
        return $message->whereHas(
            'appeal.bot',
            fn (Builder $builder) => $builder
                ->where('owner_id', $user->id)
                ->orWhereHas('users', fn (Builder $builder) => $builder->where('id', $user->id))
        )
            ->where('appeal_id', $appeal->id)
            ->exists();
    }
}
