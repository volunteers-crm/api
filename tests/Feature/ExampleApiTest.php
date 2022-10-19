<?php
/**
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

namespace Tests\Feature;

use Tests\TestCase;

class ExampleApiTest extends TestCase
{
    public function testExample()
    {
        $response = $this->get('/api');

        $response->assertStatus(200);

        $response->assertJson([
            'data' => 'ok',
        ]);
    }
}
