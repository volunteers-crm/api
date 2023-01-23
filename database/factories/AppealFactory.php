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

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Appeal;
use App\Objects\Appeals\Appeal as AppealDto;
use Carbon\Carbon;

class AppealFactory extends BaseFactory
{
    protected $model = Appeal::class;

    public function definition(): array
    {
        $status = $this->status();

        return [
            'client_id'  => $this->randomUser()->id,
            'curator_id' => $status === Status::New ? null : $this->randomUser()->id,

            'status' => $status,

            'info' => $this->info(),

            'published_at' => $this->publishedAt(),
        ];
    }

    protected function info(): ?AppealDto
    {
        if ($this->faker->boolean) {
            return null;
        }

        return AppealDto::make([
            'address' => $this->faker->streetAddress,
            'comment' => $this->faker->text,
            'date'    => $this->faker->date,
            'todo'    => $this->faker->words(),

            'persons' => $this->faker->numberBetween(0, 20),
        ]);
    }

    protected function publishedAt(): ?Carbon
    {
        return $this->faker->boolean ? now() : null;
    }
}
