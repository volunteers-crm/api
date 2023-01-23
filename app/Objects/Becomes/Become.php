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

namespace App\Objects\Becomes;

use App\Data\Casts\SortUniqueArray;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class Become extends Data
{
    public ?string $city = null;

    public array $roles = [];

    #[MapInputName('is_coordinator')]
    public bool $isCoordinator = false;

    public ?string $about = null;

    public ?string $source = null;

    #[WithCast(SortUniqueArray::class)]
    public array $recommendations = [];

    #[WithCast(SortUniqueArray::class)]
    public array $socials = [];
}
