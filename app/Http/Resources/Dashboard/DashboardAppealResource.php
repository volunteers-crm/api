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

namespace App\Http\Resources\Dashboard;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property string $date
 * @property string $opened
 * @property string $solved
 * @property string $cancelled
 * @property string $unassigned
 */
class DashboardAppealResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'date' => $this->date,

            'statuses' => [
                'opened'     => (int) $this->opened,
                'solved'     => (int) $this->solved,
                'cancelled'  => (int) $this->cancelled,
                'unassigned' => (int) $this->unassigned,
            ],
        ];
    }
}
