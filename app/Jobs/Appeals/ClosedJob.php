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

namespace App\Jobs\Appeals;

use App\Models\Channel;
use DefStudio\Telegraph\Facades\Telegraph;

class ClosedJob extends BaseJob
{
    protected function publish(Channel $channel): void
    {
        $this->update($channel);
    }

    protected function update(Channel $channel): void
    {
        Telegraph::bot($this->bot())
            ->edit($channel->pivot->message_id)
            ->chat($channel)
            ->html($this->text())
            ->send();
    }

    protected function view(): string
    {
        return view('appeals.appeal', [
            'appeal'   => $this->appeal,
            'timezone' => $this->timezone(),
            'closed'   => true,
        ])->render();
    }
}
