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

use Closure;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class HttpClient
{
    public function request(): PendingRequest
    {
        return Http::connectTimeout(
            $this->connectTimeout()
        )
            ->timeout($this->requestTimeout())
            ->acceptJson();
    }

    public function get(string $url, array $query = []): PromiseInterface|Response
    {
        return $this->send(
            fn () => $this->request()->get($url, $query)->throw()
        );
    }

    protected function send(Closure $callback): PromiseInterface|Response
    {
        return $callback();
    }

    protected function connectTimeout(): int
    {
        return config('http.timeout.connect', 10);
    }

    protected function requestTimeout(): int
    {
        return config('http.timeout.request', 20);
    }
}
