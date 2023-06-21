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

namespace App\Rules;

use App\Helpers\BotInfo;
use Illuminate\Contracts\Validation\Rule;

class CheckBotCredentialsRule implements Rule
{
    public function __construct(
        protected BotInfo $info = new BotInfo()
    ) {}

    public function passes($attribute, $value): bool
    {
        return $this->info->request($value)->successful();
    }

    public function message(): string
    {
        return __('validation.credentials');
    }
}
