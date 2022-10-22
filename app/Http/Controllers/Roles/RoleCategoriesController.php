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
use App\Http\Resources\Roles\RoleCategoryResource;
use App\Models\RoleCategory;
use Illuminate\Http\Request;

class RoleCategoriesController extends Controller
{
    public function index(Request $request)
    {
        return RoleCategoryResource::collection(
            $request->user()->roleCategories
        );
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(RoleCategory $roleCategory)
    {
    }

    public function edit(RoleCategory $roleCategory)
    {
    }

    public function update(Request $request, RoleCategory $roleCategory)
    {
    }

    public function destroy(RoleCategory $roleCategory)
    {
    }
}
