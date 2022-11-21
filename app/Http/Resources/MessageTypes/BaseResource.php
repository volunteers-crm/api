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

namespace App\Http\Resources\MessageTypes;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

/**
 * @mixin \App\Models\Message
 */
abstract class BaseResource extends JsonResource
{
    protected int $expireIn = 60;

    protected function downloadUrl(): string
    {
        return URL::temporarySignedRoute('appeals.messages.download', $this->expiredAt(), [
            'appeal'  => $this->additional['appeal_id'],
            'message' => $this->additional['message_id'],
        ]);
    }

    protected function expiredAt(): Carbon
    {
        return Carbon::now()->addMinutes($this->expireIn);
    }
}
