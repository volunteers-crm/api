<?php

/*
 * This file is part of the "Volunteers CRM" project.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Andrey Helldar <helldar@dragon-code.pro>
 *
 * @copyright 2022 Andrey Helldar
 *
 * @license MIT
 *
 * @see https://github.com/volunteers-crm
 */

namespace App\Http\Controllers;

class SeoController extends Controller
{
    public function robots()
    {
        return response(view('robots')->render(), headers: [
            'Content-Type' => 'text/plain',
        ]);
    }
}
