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

use App\Enums\Social;
use App\Models\Social as Model;
use DragonCode\LaravelActions\Action;

return new class () extends Action
{
    public function __invoke(): void
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
