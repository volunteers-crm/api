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

use App\Models\Bot;
use Illuminate\Http\Client\Response;

class BotInfo
{
    protected string $url = 'https://api.telegram.org/bot';

    protected array $response = [];

    public function __construct(
        protected HttpClient $client = new HttpClient()
    ) {
    }

    public function getName(Bot $bot): string
    {
        return $this->request($bot)->json('result.username');
    }

    public function getTitle(Bot $bot): string
    {
        return $this->request($bot)->json('result.first_name');
    }

    public function request(Bot|string $bot): Response
    {
        $url = $this->url(
            is_string($bot) ? $bot : $bot->token
        );

        return $this->response($url);
    }

    protected function response(string $url): Response
    {
        if ($response = $this->response[$url] ?? null) {
            return $response;
        }

        return $this->response[$url] = $this->client->get($url);
    }

    protected function url(string $token): string
    {
        return $this->url . $token . '/getMe';
    }
}
