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

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Resources\Roles\RoleResource;
use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function index(Request $request)
    {
        $items = $request->user()->roles;

        $items->loadMissing('roleCategories');

        return RoleResource::collection($items);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(Role $role)
    {
    }

    public function edit(Role $role)
    {
    }

    public function update(Request $request, Role $role)
    {
    }

    public function destroy(Role $role)
    {
    }
}
