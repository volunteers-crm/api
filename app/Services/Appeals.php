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

namespace App\Services;

use App\Models\Appeal;
use App\Models\User as UserModel;
use Illuminate\Support\Collection;

class Appeals
{
    public function index(UserModel $user): Collection
    {
        return Appeal::query()
            ->with('bot', 'client', 'curator')
            ->get();
    }
}
