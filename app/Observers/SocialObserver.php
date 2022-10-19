<?php

/**
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

declare(strict_types=1);

namespace App\Observers;

use App\Models\Social;
use DragonCode\Support\Facades\Helpers\Str;

class SocialObserver
{
    public function saving(Social $social)
    {
        $social->type = Str::trim($social->type);

        if (! $social->title) {
            $social->title = Str::of($social->type)->trim()->title();
        }
    }
}
