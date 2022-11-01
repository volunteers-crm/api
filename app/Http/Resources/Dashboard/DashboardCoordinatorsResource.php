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
 * @property string $appeals_opened
 * @property string $appeals_solved
 * @property string $appeals_cancelled
 *
 * @mixin \App\Models\User
 */
class DashboardCoordinatorsResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'name' => $this->name,

            'statuses' => [
                'opened'    => (int) $this->appeals_opened,
                'solved'    => (int) $this->appeals_solved,
                'cancelled' => (int) $this->appeals_cancelled,
            ],
        ];
    }
}
