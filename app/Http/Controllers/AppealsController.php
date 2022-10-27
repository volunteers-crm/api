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

use App\Http\Resources\AppealResource;
use App\Models\Appeal;
use App\Services\Appeals;
use Illuminate\Http\Request;

class AppealsController extends Controller
{
    public function index(Request $request, Appeals $appeals)
    {
        $items = $appeals->index($request->user());

        return AppealResource::collection($items);
    }

    public function store(Request $request)
    {
    }

    public function show(Appeal $appeal)
    {
    }

    public function update(Request $request, Appeal $appeal)
    {
    }

    public function destroy(Appeal $appeal)
    {
    }
}
