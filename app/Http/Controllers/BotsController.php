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

use App\Http\Requests\Bots\CreateRequest;
use App\Http\Resources\BotResource;
use App\Models\Bot;
use App\Services\Bot as BotService;
use Illuminate\Http\Request;

class BotsController extends Controller
{
    public function index(Request $request, BotService $service)
    {
        $items = $service->allOwnedBots($request->user());

        return BotResource::collection($items);
    }

    public function store(CreateRequest $request, BotService $service)
    {
        $item = $service->store($request->user(), $request->validated(), $request->get('channels'));

        return BotResource::make($item);
    }

    public function update(Request $request, Bot $bot, BotService $service)
    {
        $item = $service->update($bot, $request->validated(), $request->get('channels'));

        return BotResource::make($item);
    }

    public function destroy(Bot $bot, BotService $service)
    {
        $service->destroy($bot);

        return $this->json('ok');
    }
}
