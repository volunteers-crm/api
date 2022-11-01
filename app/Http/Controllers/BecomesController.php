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

use App\Enums\Status;
use App\Http\Resources\BecomesResource;
use App\Models\Become;
use App\Services\Becomes as BecomesService;
use Illuminate\Http\Request;

class BecomesController extends Controller
{
    public function requests(Request $request, BecomesService $becomes)
    {
        $items = $becomes->index($request->user(), Status::NEW);

        return BecomesResource::collection($items);
    }

    public function accepted(Request $request, BecomesService $becomes)
    {
        $items = $becomes->index($request->user(), Status::DONE);

        return BecomesResource::collection($items);
    }

    public function declined(Request $request, BecomesService $becomes)
    {
        $items = $becomes->index($request->user(), Status::CLOSED);

        return BecomesResource::collection($items);
    }

    public function accept(Become $become, BecomesService $becomes)
    {
        $becomes->changeStatus($become, Status::DONE);

        return $this->json('ok');
    }

    public function decline(Become $become, BecomesService $becomes)
    {
        $becomes->changeStatus($become, Status::CLOSED);

        return $this->json('ok');
    }
}
