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

namespace App\Http\Controllers;

use App\Enums\Status;
use App\Http\Requests\Appeals\PublishRequest;
use App\Http\Resources\AppealResource;
use App\Jobs\Appeals\ClosedJob;
use App\Jobs\Appeals\PublishJob;
use App\Models\Appeal;
use App\Services\Appeal as AppealService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AppealsController extends Controller
{
    public function index(Request $request, AppealService $appeals)
    {
        $items = $appeals->index($request->user());

        return AppealResource::collection($items);
    }

    public function show(Appeal $appeal, AppealService $appeals)
    {
        $item = $appeals->show($appeal);

        return AppealResource::make($item);
    }

    public function work(Request $request, Appeal $appeal, AppealService $appeals)
    {
        $item = DB::transaction(
            fn () => $appeals->toWork($request->user(), $appeal)
        );

        return AppealResource::make($item);
    }

    public function publish(PublishRequest $request, Appeal $appeal, AppealService $appeals)
    {
        $item = DB::transaction(
            fn () => $appeals->publish($appeal, $request->dto())
        );

        PublishJob::dispatch($appeal);

        return AppealResource::make($item);
    }

    public function done(Appeal $appeal, AppealService $appeals)
    {
        $item = DB::transaction(
            fn () => $appeals->changeStatus($appeal, Status::DONE)
        );

        ClosedJob::dispatch($item);

        return AppealResource::make($item);
    }

    public function cancel(Appeal $appeal, AppealService $appeals)
    {
        $item = DB::transaction(
            fn () => $appeals->changeStatus($appeal, Status::CLOSED)
        );

        ClosedJob::dispatch($item);

        return AppealResource::make($item);
    }
}
