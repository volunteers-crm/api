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

use App\Events\Messages\SendToCuratorEvent;
use App\Jobs\Messages\SendToClientJob;
use App\Models\Message;

class MessageObserver
{
    public function created(Message $message): void
    {
        $message->user_id === $message->appeal->client_id
            ? SendToCuratorEvent::broadcast($message)
            : SendToClientJob::dispatch($message);
    }
}
