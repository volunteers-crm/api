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

namespace App\Policies\Appeals;

use App\Models\Appeal;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class ShowAppealPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Appeal $appeal): Response
    {
        return $appeal->bot->users()->where('id', $user->id)->exists()
            ? $this->allow()
            : $this->deny(__('http-statuses.403'));
    }
}
