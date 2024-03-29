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

use App\Http\Requests\Messages\CreateRequest;
use App\Http\Requests\Messages\DownloadRequest;
use App\Http\Resources\MessageResource;
use App\Models\Appeal;
use App\Models\Message as MessageModel;
use App\Services\Message;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function index(Appeal $appeal, Message $messages)
    {
        $items = $messages->index($appeal);

        return MessageResource::collection($items);
    }

    public function store(CreateRequest $request, Appeal $appeal, Message $messages)
    {
        $item = DB::transaction(
            fn () => $messages->store($request->user(), $appeal, $request->get('message'))
        );

        return MessageResource::make($item);
    }

    public function download(DownloadRequest $request, Appeal $appeal, MessageModel $message, Message $messages)
    {
        $file = $messages->file($appeal->bot, $message);

        return response()->download($file->full_path, $file->filename);
    }
}
