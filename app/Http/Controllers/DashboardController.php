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

namespace App\Http\Controllers;

use App\Http\Resources\Dashboard\DashboardAppealResource;
use App\Http\Resources\Dashboard\DashboardCoordinatorResource;
use App\Http\Resources\Dashboard\DashboardRoleResource;
use App\Services\Dashboard as DashboardService;
use Closure;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function appeals(Request $request, DashboardService $dashboard)
    {
        $items = $this->remember('appeals', fn () => $dashboard->appeals($request->user()));

        return DashboardAppealResource::collection($items);
    }

    public function coordinators(Request $request, DashboardService $dashboard)
    {
        $items = $this->remember('coordinators', fn () => $dashboard->coordinators($request->user()));

        return DashboardCoordinatorResource::collection($items);
    }

    public function storages(DashboardService $dashboard)
    {
        $items = $this->remember('storages', fn () => $dashboard->roles(true));

        return DashboardRoleResource::collection($items);
    }

    public function roles(DashboardService $dashboard)
    {
        $items = $this->remember('roles', fn () => $dashboard->roles());

        return DashboardRoleResource::collection($items);
    }

    protected function remember(string $method, Closure $callback): Collection
    {
        return $this->cache([static::class, $method], 10)
            ->withAuth()
            ->remember($callback);
    }
}
