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

namespace App\Objects\Becomes;

use DragonCode\SimpleDataTransferObject\DataTransferObject;
use DragonCode\Support\Facades\Helpers\Arr;

class Become extends DataTransferObject
{
    public ?string $city = null;

    public array $roles = [];

    public bool $isCoordinator = false;

    public ?string $about = null;

    public ?string $source = null;

    public array $recommendations = [];

    public array $socials = [];

    protected $map = [
        'is_coordinator' => 'isCoordinator',
    ];

    protected function castRecommendations(array $values): array
    {
        return $this->sort($values);
    }

    protected function castSocials(array $values): array
    {
        return $this->sort($values);
    }

    protected function sort(array $values): array
    {
        return Arr::of($values)->filter()->unique()->sort()->values()->toArray();
    }
}
