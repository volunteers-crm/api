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

namespace App\Http\Resources\MessageTypes;

use App\Http\Controllers\MessagesController;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin \App\Models\Message
 */
abstract class BaseResource extends JsonResource
{
    protected function downloadUrl(): string
    {
        return action([MessagesController::class, 'download'], [
            'appeal'  => $this->additional['appeal_id'],
            'message' => $this->additional['message_id'],
        ]);
    }
}
