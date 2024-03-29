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

use App\Enums\Status;
use App\Models\Appeal as AppealModel;
use App\Models\User as UserModel;
use App\Objects\Appeals\Appeal as AppealDTO;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Collection;

class Appeal
{
    public function index(UserModel $user): Collection
    {
        return AppealModel::query()
            ->with('bot', 'client', 'curator')
            ->hasOwnerByBot($user)
            ->orderByRaw('CASE WHEN `status` = ? THEN 0 WHEN `status` = ? THEN 1 ELSE 2 END', [Status::New, Status::InProgress])
            ->orderBy('id')
            ->get();
    }

    public function show(AppealModel $appeal): AppealModel
    {
        return $this->loadingMissing($appeal, ['chats']);
    }

    public function toWork(UserModel $user, AppealModel $appeal): AppealModel
    {
        $appeal->curator()->associate($user)->saveOrFail();

        return $this->loadingMissing($appeal);
    }

    public function publish(AppealModel $appeal, AppealDTO $info): AppealModel
    {
        $appeal->info         = $info;
        $appeal->published_at = now();
        $appeal->save();

        $appeal->chats()->sync($info->channels);

        return $this->loadingMissing($appeal);
    }

    public function changeStatus(AppealModel $appeal, Status $status): AppealModel
    {
        $appeal->status = $status;
        $appeal->save();

        return $this->loadingMissing($appeal);
    }

    protected function loadingMissing(AppealModel $appeal, array $additional = []): AppealModel
    {
        return $appeal->loadMissing([
            'bot.chats' => fn (Relation $relation) => $relation->public(),
            'client',
            'curator',
            ...$additional,
        ]);
    }
}
