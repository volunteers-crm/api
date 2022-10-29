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

namespace App\Http\Controllers;

use App\Http\Requests\Roles\CreateRequest;
use App\Http\Requests\Roles\DestroyRequest;
use App\Http\Requests\Roles\UpdateRequest;
use App\Http\Resources\RoleResource;
use App\Models\Role;
use App\Services\Role as RoleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RolesController extends Controller
{
    public function index(Request $request, RoleService $service)
    {
        $items = $service->index($request->user());

        return RoleResource::collection($items);
    }

    public function store(CreateRequest $request, RoleService $service)
    {
        $item = DB::transaction(
            fn () => $service->store($request->user(), $request->validated())
        );

        return RoleResource::make($item);
    }

    public function update(UpdateRequest $request, Role $role, RoleService $service)
    {
        $item = DB::transaction(
            fn () => $service->update($role, $request->validated())
        );

        return RoleResource::make($item);
    }

    public function destroy(DestroyRequest $request, Role $role, RoleService $service)
    {
        DB::transaction(
            fn () => $service->destroy($role)
        );

        return $this->json('ok');
    }
}
