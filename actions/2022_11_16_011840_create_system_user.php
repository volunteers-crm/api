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

use App\Models\Social;
use DragonCode\LaravelActions\Action;
use Illuminate\Database\Eloquent\Collection;

return new class () extends Action
{
    protected string $avatar = 'https://via.placeholder.com/256x256.png/0088cc?text=root';

    protected string $name = 'System';

    public function __invoke(): void
    {
        $this->socials()->each(
            fn (Social $social) => $this->create($social, $this->name, $this->avatar)
        );
    }

    protected function create(Social $social, string $name, string $avatar, int $external_id = 0): void
    {
        $social->users()->updateOrCreate(
            compact('external_id'),
            compact('avatar', 'name')
        );
    }

    protected function socials(): Collection
    {
        return Social::get();
    }
};
