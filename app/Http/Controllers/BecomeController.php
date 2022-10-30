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

use App\Enums\Policy;
use App\Http\Requests\Becomes\BecomeRequest;
use App\Http\Resources\BecomeResource;
use App\Http\Resources\BotResource;
use App\Models\Bot;
use App\Services\Become as BecomeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BecomeController extends Controller
{
    public function index(Request $request, BecomeService $become)
    {
        $items = $become->index($request->user());

        return BecomeResource::collection($items);
    }

    public function search(Bot $bot, BecomeService $become)
    {
        $this->authorize(Policy::BECOME_SEARCH->value, $bot);

        $item = $become->search($bot);

        return BotResource::make($item);
    }

    public function store(BecomeRequest $request, Bot $bot, BecomeService $become)
    {
        $item = DB::transaction(
            fn () => $become->store($request->user(), $bot, $request->dto())
        );

        return BecomeResource::make($item);
    }

    public function cancel(Request $request, Bot $bot, BecomeService $become)
    {
        DB::transaction(
            fn () => $become->cancel($request->user(), $bot)
        );

        return $this->json('ok');
    }
}
