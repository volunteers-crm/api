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

namespace App\Observers;

use App\Enums\Status;
use App\Jobs\Appeals\ClosedJob;
use App\Jobs\Appeals\PublishJob;
use App\Models\Appeal;

class AppealObserver
{
    public function creating(Appeal $appeal): void
    {
        $appeal->status = Status::New;
    }

    public function updating(Appeal $appeal): void
    {
        if ($appeal->isDirty('curator_id')) {
            $appeal->status = Status::InProgress;
        }
    }

    public function updated(Appeal $appeal): void
    {
        if ($appeal->wasChanged('published_at')) {
            PublishJob::dispatch($appeal);

            return;
        }

        if ($appeal->wasChanged('status') && in_array($appeal->status, [Status::Done, Status::Closed])) {
            ClosedJob::dispatch($appeal);
        }
    }
}
