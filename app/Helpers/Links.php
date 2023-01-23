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

namespace App\Helpers;

class Links
{
    public function toMessage(int $chatId, int $messageId): string
    {
        $id = $this->resolveChatId($chatId);

        return sprintf('https://t.me/c/%d/%d', $id, $messageId);
    }

    protected function resolveChatId(int $chatId): int
    {
        return abs($chatId) > 1000000000000 ? abs($chatId) - 1000000000000 : abs($chatId);
    }
}
