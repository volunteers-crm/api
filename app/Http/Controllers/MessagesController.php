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

use App\Http\Requests\Messages\CreateRequest;
use App\Http\Resources\MessageResource;
use App\Models\Appeal;
use App\Services\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index(Request $request, Appeal $appeal, Message $messages)
    {
        $items = $messages->index($request->user(), $appeal);

        return MessageResource::collection($items);
    }

    public function store(CreateRequest $request, Appeal $appeal, Message $messages)
    {
        $item = $messages->store($request->user(), $appeal, $request->get('message'));

        return MessageResource::make($item);
    }
}
