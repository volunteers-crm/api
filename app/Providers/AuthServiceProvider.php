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

namespace App\Providers;

use App\Enums\Policy;
use App\Policies\Becomes;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /** @var array<class-string, array<string, Policy>> */
    protected array $gates = [
        Becomes\SearchPolicy::class => [
            'search' => Policy::BECOME_SEARCH,
        ],
    ];

    public function boot()
    {
        $this->registerGates();
    }

    protected function registerGates(): void
    {
        foreach ($this->gates as $policy => $gates) {
            foreach ($gates as $method => $gate) {
                Gate::define($gate->value, [$policy, $method]);
            }
        }
    }
}
