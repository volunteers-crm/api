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

namespace App\Helpers;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BotInfo
{
    protected string $url = 'https://api.telegram.org/bot';

    public function getName(string $token): string
    {
        return $this->request($token)->json('result.username');
    }

    public function request(string $token): Response
    {
        return Http::get($this->url($token));
    }

    protected function url(string $token): string
    {
        return $this->url . $token . '/getMe';
    }
}
