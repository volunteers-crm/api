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

namespace App\Http\Controllers;

use App\Http\Resources\ChannelResource;
use App\Models\Channel;
use App\Services\Channel as ChannelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChannelsController extends Controller
{
    public function index(Request $request, ChannelService $service)
    {
        $items = $service->all($request->user());

        return ChannelResource::collection($items);
    }

    public function destroy(Request $request, Channel $channel, ChannelService $service)
    {
        DB::transaction(
            fn () => $service->destroy($request->user(), $channel)
        );

        return $this->json('ok');
    }
}
