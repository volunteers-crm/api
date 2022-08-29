<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

use App\Enums\Social;
use App\Models\Social as Model;
use DragonCode\LaravelActions\Support\Actionable;

return new class () extends Actionable
{
    public function up(): void
    {
        foreach ($this->socials() as $social) {
            $this->store($social);
        }
    }

    protected function store(string $type): void
    {
        Model::query()->updateOrCreate(compact('type'));
    }

    protected function socials(): array
    {
        return Social::values();
    }
};
